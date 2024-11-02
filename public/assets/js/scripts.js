
(function($) {
    "use strict";

    /*================================
    Preloader
    ==================================*/

    var preloader = $('#preloader');
    $(window).on('load', function() {
        setTimeout(function() {
            preloader.fadeOut('slow', function() { $(this).remove(); });
        }, 300)
    });

    /*================================
    sidebar collapsing
    ==================================*/
    if (window.innerWidth <= 1364) {
        $('.page-container').addClass('sbar_collapsed');
    }
    $('.nav-btn').on('click', function() {
        $('.page-container').toggleClass('sbar_collapsed');
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    datatable active
    ==================================*/
    if ($('#table').length) {
        $('#table').DataTable({
            responsive: true,
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: 'Table Data',
                    className: 'btn btn-sm font-sm btn-success',
                    exportOptions: {
                     columns: ':visible:not(.no-print)'
                    }
                }, {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: 'Table Data',
                    className: 'btn btn-sm font-sm btn-danger',
                    exportOptions: {
                        columns: ':visible:not(.no-print)'
                    }
                }, {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    title: 'Table Data',
                    className: 'btn btn-sm font-sm btn-primary',
                    exportOptions: {
                       columns: ':visible:not(.no-print)'
                    }
                },
            ],initComplete: function() {
                $("#table_filter").appendTo(".dt-buttons");
            }

           
        });
    }
  

      /*================================
    Flat TimePicker
    ==================================*/

    function initializeTimePickers() {
        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 15
        });
        flatpickr("#timepicker2", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 15
        });
    }
    $(document).ready(function(){
        initializeTimePickers();
    });


     /*================================
    Flat DatePicker
    ==================================*/
    // Employees
    $(document).ready(function() {
        flatpickr("#employee_dob", {
            enableTime: false,
            noCalendar: false,   
            dateFormat: "Y-m-d",  
        });
    });

    $(document).ready(function() {
        flatpickr("#hiring_date", {
            enableTime: false,
            noCalendar: false,  
            dateFormat: "Y-m-d", 
            
        });
    });


    /*================================
    datatable active
    ==================================*/
 

    $(document).ready(function() {
        if ($('#Department_table').length) {
            $('#Department_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Departments',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Departments',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Departments',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "dep_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#Department_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }
    
        if ($('#Employee_table').length) {
            $('#Employee_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Employees',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Employees',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Employees',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "emp_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#Employee_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }
    
        if ($('#overtime_table').length) {
            $('#overtime_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'OverTime',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'OverTime',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'OverTime',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "overtime_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#overtime_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }
    
    
        if ($('#schedule_table').length) {
            $('#schedule_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Schedule',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Schedule',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Schedule',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "schedule_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#schedule_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }


        if ($('#position_table').length) {
            $('#position_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Position',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Position',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Position',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "position_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#position_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }




        
        if ($('#cash_advance_table').length) {
            $('#cash_advance_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Cash Advance',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Cash Advance',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Cash Advance',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "cash_advance_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#cash_advance_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }



        if ($('#loan_table').length) {
            $('#loan_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Loan',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Loan',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Loan',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "loan_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#loan_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }
        if ($('#jobNature_table').length) {
            $('#jobNature_table').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0,1] }
                ],
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Job Nature',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Job Nature',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Job Nature',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                    {
                        text: '<i class="fa fa-trash-o"></i>',
                        title: 'Delete',
                        className: 'btn btn-sm font-sm btn-danger',
                        attr : {
                            id: "jobNature_delete-btn"
                        }
                    },
                ],initComplete: function() {
                    $("#jobNature_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }






        if ($('#Employee_Schedule_table').length) {
            $('#Employee_Schedule_table').DataTable({
                responsive: true,
                 dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Employee Schedule',
                        className: 'btn btn-sm font-sm btn-success',
                        exportOptions: {
                         columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Employee Schedule',
                        className: 'btn btn-sm font-sm btn-danger',
                        exportOptions: {
                            columns: ':visible:not(.no-print)'
                        }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Employee Schedule',
                        className: 'btn btn-sm font-sm btn-primary',
                        exportOptions: {
                           columns: ':visible:not(.no-print)'
                        }
                    },
                   
                ],initComplete: function() {
                    $("#Employee_Schedule_table_filter").appendTo(".dt-buttons");
                }
    
               
            });
        }



    });
    

     /*================================
    Delete By Deletion
    ==================================*/

    $(document).ready(function() {
        // Departments
        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#dep_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any department");
            }else{
                const conf = confirm("Are you sure you want to delete these Departments?");
                if(conf){
                    $.ajax({
                        url: 'department/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { department_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Departments deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete departments");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete departments");
                        }
                    });
                }
            }


        });


        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#emp_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any Employee");
            }else{
                const conf = confirm("Are you sure you want to delete these Employees?");
                if(conf){
                    $.ajax({
                        url: 'employee/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { employee_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Employees deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete Employees");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete Employees");
                        }
                    });
                }
            }


        });



        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#overtime_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any Overtime");
            }else{
                const conf = confirm("Are you sure you want to delete these Overtimes?");
                if(conf){
                    $.ajax({
                        url: 'overtime/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { overtime_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Overtimes deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete Overtimes");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete Overtimes");
                        }
                    });
                }
            }


        });



        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#schedule_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any schedule");
            }else{
                const conf = confirm("Are you sure you want to delete these schedules?");
                if(conf){
                    $.ajax({
                        url: 'schedule/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { overtime_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("schedules deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete schedules");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete schedules");
                        }
                    });
                }
            }


        });



        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#position_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any position");
            }else{
                const conf = confirm("Are you sure you want to delete these positions?");
                if(conf){
                    $.ajax({
                        url: 'position/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { position_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("positions deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete positions");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete positions");
                        }
                    });
                }
            }


        });

        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#cash_advance_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any Cash Advance");
            }else{
                const conf = confirm("Are you sure you want to delete these Cash Advances?");
                if(conf){
                    $.ajax({
                        url: 'cashAdvance/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { cashAdvance_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Advances deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete Advances");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete Advances");
                        }
                    });
                }
            }


        });



        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#loan_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any Loan");
            }else{
                const conf = confirm("Are you sure you want to delete these Loans?");
                if(conf){
                    $.ajax({
                        url: 'loan/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { loan_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Loans deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete Loans");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete Loans");
                        }
                    });
                }
            }


        });



        $("#select_all").on("change", function() {
            const isChecked = $(this).is(":checked"); 
            $(".each_select").prop("checked", isChecked);
        });

        $("#jobNature_delete-btn").on("click", function(){

            const selected_ids = [];
            $(".each_select:checked").each(function() {
                selected_ids.push($(this).val());
            });

            if(selected_ids.length < 1){
                alert("Please select any Job Nature");
            }else{
                const conf = confirm("Are you sure you want to delete these Cash Job Natures?");
                if(conf){
                    $.ajax({
                        url: 'jobNature/deletebyselection',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { job_nature_ids: selected_ids },
                        success: function(response){
                            if(response.status){
                                alert("Job Natures deleted successfully");
                                location.reload();
                            } else {
                                alert("Failed to delete Job Natures");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert("Failed to delete Job Natures");
                        }
                    });
                }
            }


        });



        



    });


   



    /*================================
    Slicknav mobile menu
    ==================================*/
    $('ul#nav_menu').slicknav({
        prependTo: "#mobile_menu"
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }

})(jQuery);