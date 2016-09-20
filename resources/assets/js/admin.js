$(function () {
        var companies_table = $("#companies").DataTable();
        var company_clients_table = $("#company_clients").DataTable();
        var clients_table = $("#clients").DataTable();
        var faxes_table = $("#faxes").DataTable();
        // var users_table = $("#users").DataTable();

        $('#companies tbody').on('click', 'tr', function () {
                var data = companies_table.row( this ).data();
                window.location.href = $(this).data('href');
        } );

        $('#clients tbody').on('click', 'tr', function () {
                var data = clients_table.row( this ).data();
                window.location.href = $(this).data('href');
        } );

        $('#faxes tbody').on('click', 'tr', function () {
                var data = faxes_table.row( this ).data();
                window.location.href = $(this).data('href');
        } );

        // $('#users tbody').on('click', 'tr', function () {
        //         var data = users_table.row( this ).data();
        //         window.location.href = $(this).data('href');
        // } );
});