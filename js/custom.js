$(document).ready(function() {
    var amountScrolled = 250;

    /* for routing */
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    /* datatables customer toolbar tools */
    var approve = '<button id="btn_approve" class="uk-button uk-button-small" disabled><i class="uk-icon-check"></i> Approve</button>';
    var reject  = '<button id="btn_reject"  class="uk-button uk-button-small" disabled><i class="uk-icon-times"></i> Reject</button>';
    var revert  = '<button id="btn_revert"  class="uk-button uk-button-small" disabled><i class="uk-icon-level-down"></i> Revert</button>';
    var all = '<button id="btn_all" class="uk-button uk-button-small" disabled> Select All</button>';
    var des = '<button id="btn_des" class="uk-button uk-button-small" disabled> Deselect All</button>';

    /* for enabling/disabling of button */
    var counterChecked = 0;

    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

    $(window).scroll(function() {
       if( $(window).scrollTop() > amountScrolled ) {
           $('a.back-to-top').fadeIn('slow');
       } else {
           $('a.back-to-top').fadeOut('slow');
       }
    });

//    var tempScrollTop = $(window).scrollTop();    
//    $(window).scrolltop(tempScrollTop);
//
//    $(function() {
//       $(window).unload(function() {
//          var scrollPosition = $('#tbl_los').scrollTop();
//          localStorage.setItem("scrollPosition", scrollPosition);
//       });
//       if(localStorage.scrollPosition) {
//          $('#tbl_los').scrollTop(localStorage.getItem("scrollPosition"));
//       }
//    });  

    $('a.back-to-top').click(function() {
       $('html, body').animate({
           scrollTop: 0
       }, 700);
       return false;
    });

    $('#hr-memo').DataTable({
        'order' : [[0, 'desc'], [1, 'asc']]
    });

    /* LOS datatable initialization */
  var tbl_los = $('#tbl_los').DataTable({
        //'serverSide': true,
        'ajax' : {
            'url': baseUrl + '/operations/ops_pending_app'
        },
        'columns' : [
            {
                'width': '1%',
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'uk-text-center',
                'render': function(data, type, full, meta) {
                   return '<input type="checkbox">'; 
                }
            },
            {'width': '3%', 'className': 'dt-center', 'data': 'OurBranchID'},
            {'width': '3%', 'className': 'dt-center', 'data': 'GroupID'},  
            {'width': '3%', 'className': 'dt-center', 'data': 'FileNo'},
            {'width': '12%', 'data': 'ClientName'},
            {'width': '3%', 'className': 'dt-center', 'data': 'ClientID'},
            {'width': '4%', 'className': 'dt-center', 'data': 'BRNETClientID'},
            {'width': '3%', 'className': 'dt-center', 'data': 'LOSLoanTypeID'},
            {'visible': false, 'data': 'ProcessValue'},
            {'width': '2%', 'className': 'dt-center uk-text-bold', 'data': 'Age'},
            {'width': '3%', 'className': 'dt-center uk-text-bold', 'data': 'DestProcess'},
            {
                'width': '2%', 
                'data': null, 
                'defaultContent':  '<button class="uk-button uk-button-small uk-button-primary">View</button>'
            },
            {'visible': false, 'targets': 10, 'data': 'AsOfDate'}
        ],
        'iDisplayLength': 25,
        'oLanguage': {
            'sSearch': 'Search all columns:',
            'sEmptyTable': 'No pending application'
        },
        'deferRender': true,
        //'stateSave': true,
        'drawCallback' : function () {
            var api  = this.api();
            var rows = api.rows({ page : 'current' }).nodes();
            var last = null;
            var role_id = $('#txt_role').val();
            
            api.column(12, { page : 'current' }).data().each( function(group, i) {       
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group uk-text-bold"><td colspan="12">' + group + '</td></tr>');
                    last = group;
                }
            });
            
            $('tbody').find('.group').each(function (i, v) {
               var rowCount = $(this).nextUntil('.group').length;
               $(this).find('td:first').append($('<span />').append($('<b/>', { 
                   'text': ' (' + rowCount + ')' 
               })));
            });
            
            last = null;
            
            api.column(10, { page : 'current'}).data().each( function(group, i) {
                if(role_id === 'qa' && group === 'KYC') {
                    $(rows).eq(i).find("input, button").attr("disabled", false);
                } else if (role_id === 'bm' && group === 'BMV') {
                    $(rows).eq(i).find("input, button").attr("disabled", false);
                } else if (role_id === 'qa' && group === 'ALAF') {
                    $(rows).eq(i).find("input, button").attr("disabled", false);
                } else if (role_id === 'tc' && group === 'TC') {
                    $(rows).eq(i).find("input, button").attr("disabled", false);
                } else if (role_id === 'cpu' && group === 'SANCTION') {
                    $(rows).eq(i).find("input, button").attr("disabled", false);
                } else {
                    $(rows).eq(i).find("input, button").attr("disabled", true);
                }
            });
        },
        'bSort': false,
        'dom': '<"toolbar">frtip'
    });
    tbl_los.order( [ 11, 'desc' ] ).draw();

    /* datatables content: view profile button */
    $('#tbl_los tbody').on('click', 'button', function() {
        var data = tbl_los.row($(this).parents('tr')).data();
        location.href = data.GroupID + '/' + data.FileNo;
    });

    /* get hidden field for currently logged user */
    var role = $('#txt_role').val();;

    /* sometimes it's working, sometimes not :P */
    if(role === 'qa') {
        $('#losbody div.toolbar').html(approve + reject + all + des);
    } else {
        $('#losbody div.toolbar').html(approve + reject + revert + all + des);
    };

    var actionArray = new Array();

    /* enabling/disabling a button */
    $('#tbl_los').on('change', 'input[type="checkbox"]', function() {
        this.checked ? counterChecked++ : counterChecked--;
        getAllCheckedItems();

        if(actionArray.includes('REJ')) {
            $('#btn_approve').prop('disabled', true);
        } else {
            counterChecked > 0 ? $('#btn_approve').prop('disabled', false) : $('#btn_approve').prop('disabled', true);
        }
        counterChecked > 0 ? $('#btn_reject').prop('disabled', false) : $('#btn_reject').prop('disabled', true);
        counterChecked > 0 ? $('#btn_revert').prop('disabled', false) : $('#btn_revert').prop('disabled', true);
        counterChecked > 0 ? $('#btn_all').prop('disabled', false) : $('#btn_all').prop('disabled', true);
        counterChecked > 0 ? $('#btn_des').prop('disabled', false) : $('#btn_des').prop('disabled', true);
    });

    function getAllCheckedItems() {
        actionArray.splice(0, actionArray.length);
        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
           var data = tbl_los.row($(this).parents('tr')).data();
           actionArray[actionArray.length] = data.ProcessValue;
        });
    }

    // checkbox: approve all selected entries.
    $('#btn_approve').click(function () {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function () {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                          type: 'POST',
                          url: baseUrl + '/operations/los_laf/' + data.FileNo + '/APR'
                      });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId  = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata  = $('#txt_datedata').val();

            if (row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    $('#btn_reject').click(function() {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                          type: 'POST',
                          url: baseUrl + '/operations/los_laf/' + data.FileNo + '/REJ'
                      });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata = $('#txt_datedata').val();

            if(row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    $('#btn_revert').click(function() {
        var branchId, groupId;
        var counter = 0;
        var xhrs = [];

        $('#tbl_los').find('input[type="checkbox"]:checked').each(function() {
            var data = tbl_los.row($(this).parents('tr')).data();
            var xhr = $.ajax({
                          type: 'POST',
                          url: baseUrl + '/operations/los_laf/' + data.FileNo + '/REV'
                      });
            xhrs.push(xhr);
            branchId = data.OurBranchID;
            groupId = data.GroupID;
            counter++;
        });

        $.when.apply($, xhrs).done(function() {
            var row_count = $('#tbl_los tr').length - 2;
            var datedata = $('#txt_datedata').val();

            if(row_count - counter === 0) {
                location.href = baseUrl + '/operations/los';
            } else {
                location.href = baseUrl + '/operations/los/' + datedata + '/' + branchId + '/' + groupId;
            }
        });
    });

    $('#btn_all').click(function() {
        $('#tbl_los').find('input[type="checkbox"]').each(function() {
            this.checked = true;
        });
    });

    $('#btn_des').click(function() {
        $('#tbl_los').find('input[type="checkbox"]').each(function() {
           this.checked = false;
        });
    });

    // expand all accordion headers.
    var accordion = UIkit.accordion(UIkit.$('#los-accordion'), {collapse:false, showfirst: false});
    accordion.find('[data-wrapper]').each(function () {
        accordion.toggleItem(UIkit.$(this), true, false);
    });

    // initialize tellecaller table
    $('input[name="checkme"][value="1"]').attr('checked','checked');
    $('#result').attr('checked',true);
    var tbl_tc = $('#tbl_tc').DataTable({

       'columns': [
           {
               'width': '10%',
               'searchable': false,
               'orderable': false
           },
           {
               'width': '42%',
               'className': 'uk-text-left'
           },
           {
               'width': '12%',
               'className': 'dt-center',
               'searchable': false,
               'orderable': false
           },
           {
               'width': '12%',
               'className': 'dt-center',
               'searchable': false,
               'orderable': false
           },
           {
               'width': '12%',
               'className': 'dt-center',
               'searchable': false,
               'orderable': true
           },
           {
               'width': '12%',
               'className': 'dt-center',
               'searchable': false,
               'orderable': false
           },
       ],

        "oLanguage": { "sSearch": "" },
        'iDisplayLength': 100,
        'paging': false,
        "bInfo" : false,
        'dom': '<"toolbar">frtip',
        'searching': true,
        "bLengthChange": false,
        columnDefs: [ {
            orderable: false,
            targets:   0
        } ],
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ -1,-2 ,-3,-4]
            }
        ],
        order: [[ 0, 'asc' ]],
    });
    var tbl_rid = $('#tbl_rid').DataTable({

        'columns': [
            {
                'width': '10%',
                'className': 'dt-center'
            },
            {
                'width': '20%',
                'className': 'uk-text-left'
            },
            {
                'width': '15%',
                'className': 'dt-center'
            },
            {
                'width': '10%',
                'className': 'uk-text-left'
            },
            {
                'width': '5%',
                'className': 'dt-center'
            },
            {
                'width': '10%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false
            },
            {
                'width': '10%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': true
            },
            {
                'width': '10%',
                'className': 'dt-center',
                'searchable': false,
                'orderable': false
            },
        ],

        "oLanguage": { "sSearch": "" },
        'iDisplayLength': 10,
        'paging': true,
        "bInfo" : true,
        'dom': '<"toolbar">frtip',
        'searching': true,
        "bLengthChange": true,
        columnDefs: [ {
            orderable: false,
            targets:   0
        } ],
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ -1,-2 ,-3,-4]
            }
        ],
        order: [[ 0, 'asc' ]],
    });
    $('div.dataTables_filter input').attr('placeholder', 'Search...');

    $(".cancel-btn").on('click', function () {
        window.location.reload();
        $(".add_form modal").hide();
    });
    $('#c_rejected').DataTable();
    $('#c_search').dataTable( {
        "searching": false,
        "lengthChange": false
    } );
    tbl_tc.order([0, 'asc']).draw();
    $(".clear-table").on("click", function() {
        $('#c_search').hide()
    });

    $(".open-AddBookDialog").on("click", function() {
        var dataQuestNo = $(this).attr("data-question-no");
        var dataQuest = $(this).attr("data-question");
        var dataNew = $(this).attr("data-new");
        var dataRepeat = $(this).attr("data-repeat");
        var dataSet = $(this).attr("data-set");
        $("#hide").val(dataQuestNo);
        $("#inputQuestion").val(dataQuest);
        $("#inputNew").val(dataNew);
        $("#inputRepeat").val(dataRepeat);
        $("#inputSet").val(dataSet);

        $('input[name="is_new"][value="1"]').attr('checked','checked');
        $('input[name="is_repeat"][value="1"]').attr('checked','checked');
        $('input[name="is_set"][value="1"]').attr('checked','checked');

    });

    $('.open-AddBookDialog').on('click', function() {
        $(this).closest('form').submit();
    });



    $('div.dataTables_filter ').addClass('op-search-box');
    $('div.dataTables_filter label').addClass('uk-icon-search');

    /* Create new question */
    $(".crud-submit").click(function(e){
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var title = $("#create-item").find("input[name='title']").val();
        var description = $("#create-item").find("textarea[name='description']").val();

        if(title != '' && description != ''){
            $.ajax({
                dataType: 'json',
                type:'POST',
                url: url + form_action,
                data:{title:title, description:description}
            }).done(function(data){
                $("#create-item").find("input[name='title']").val('');
                $("#create-item").find("textarea[name='description']").val('');
                getPageData();
                $(".modal").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
            });
        }else{
            alert('You are missing title or description.')
        }

    });

    //INPUT FIELD JS
    'use strict';

    $('.input-file').each(function() {
        var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();

        $input.on('change', function(element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
    });
    //END OF INPUT FIELD JS

});





