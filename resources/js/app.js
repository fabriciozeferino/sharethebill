/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {

    // Let user check user in
    $('.userOnEvent').on('click', function () {

        let elementId = $(this).attr('data-checkbox');
        let amountElement = $('#amountInput' + elementId);
        let paidElement = $('#paidInput' + elementId);

        if ($(this).prop('checked')) {
            amountElement.prop('disabled', false);
            paidElement.prop('disabled', false);
        } else {
            amountElement.val(null);
            paidElement.val(null);
            amountElement.trigger('change');
            paidElement.trigger('change');
            amountElement.prop('disabled', true);
            paidElement.prop('disabled', true);
        }
    });

    // SUM total spend
    $('.amountInput').on('keyup keypress blur change', function (e) {
        let sum = 0;

        $('.amountInput').each(function () {
            sum += parseFloat(this.value);
        });

        $('#amountTotalInput').val(sum);
    });

    // SUM total paid
    $('.paidInput').on('keyup keypress blur change', function (e) {
        let sum = 0;

        $('.paidInput').each(function () {
            sum += parseFloat(this.value);
        });

        $('#paidTotalInput').val(sum);
    });

    // Prevent user to submit form without values
    $('#createBillBtn').click(function (e) {

        let spend = parseFloat($('#amountTotalInput').val());
        let paid = parseFloat($('#paidTotalInput').val());

        if (spend !== paid || spend + paid === 0) {

            $('#errorCreate').text('The value Spend and Paid needs to match');
            e.preventDefault();
        }
        ;
    });

    // Check opened Bills
    $('#btnCloseModal').on('click', function () {
        axios.get('/bills/opened')
            .then(response => {
                let row = '';

                response.data.opened.forEach(function (opened) {
                    row += `<tr><td>${opened.name}</td><td class="text-danger">${opened.spend}</td><td class="text-success">${opened.paid}</td><td>${opened.total}</td></tr>`
                });

                $('#billTable').append(row);
            })
    })

    // Clean modal bills
    $('#closeModal').on('hidden.bs.modal', function (e) {
        $('#billTable').html(`<table class="table table-active" id="billTable"><tr class="table-success"><th scope="row">User</th><td>Spend</td><td>Paid</td><td>Total</td></tr></table>`)
    })


    // Show bill
    $('#editModal').on('shown.bs.modal', function (e) {

        var id = $(e.relatedTarget).data('id');

        $('#editModal').modal('show').find('.modal-body').load(`bills/${id}/edit`, function (e) {

            // SUM total spend and populate total
            let spend = 0;
            let paid = 0;

            $('.spendEditInput').each(function () {
                spend += parseFloat(this.value);
            });

            $('.paidEditInput').each(function () {
                paid += parseFloat(this.value);
            });

            $('#spendEditTotalInput').val(spend);
            $('#paidEditTotalInput').val(paid);
        });
    })


});
