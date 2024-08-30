$(function () {
    function hitungHarga() {
        var dateIn = new Date($("#in").val());
        var dateOut = new Date($("#out").val());
        var diffTime = Math.abs(dateOut - dateIn);
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        var hargaPerHari = parseInt($("#kamar").val().replace(/[^0-9]/g, ''), 10);
        var totalHarga = diffDays * hargaPerHari;
        $("#harga").val("Rp " + totalHarga.toLocaleString('id-ID'));
    }

    $("#in").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        onSelect: function (selectedDate) {
            var dateIn = new Date(selectedDate);
            var options = [];

            for (var i = 1; i <= 12; i++) {
                var newDate = new Date(dateIn);
                newDate.setMonth(newDate.getMonth() + i);
                options.push(newDate.toISOString().split('T')[0]);
            }

            $("#out").datepicker("destroy").datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShowDay: function (date) {
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    return [options.includes(formattedDate)];
                }
            }).prop("disabled", false);
        }
    });

    $("#out").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function () {
            $("#kamar").prop("disabled", false);
        }
    }).prop("disabled", true);

    $("#kamar").prop("disabled", true).change(function () {
        hitungHarga();
    });
});
