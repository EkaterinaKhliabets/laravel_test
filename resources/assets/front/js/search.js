(function ($) {

    $(document).ready(function () {

        //$(':checkbox').click(function (e) {
        $('#crm-laravel-user-click').click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            //e.preventDefault();

            /*if ($(':checkbox:checked').val() == 'not_valid') {
                let url = window.location.href;
                //console.log('{{route("users.index")}}');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        not_valid: '1'
                    },
                    success: function (result) {
                        console.log(result);
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            }*/

            if ($(':checkbox:checked').val() == 'not_valid') {
                //let new_url = window.location.href + '?not_valid=1';

                let old_url = window.location.href;

                console.log(old_url.indexOf('not_valid=1'));

                let new_url;
                if (old_url.indexOf('not_valid=1') === -1) {
                    new_url = window.location.href + '?not_valid=1';
                } else {
                    new_url = old_url;
                }


                // let new_url = window.location.href + '?not_valid=1';
                document.location.href = new_url;
            } else {
                let url = window.location.href;
                let new_url1 = url.replace('?not_valid=1', '');
                document.location.href = new_url1;
            }
        });


        $(".crm-user-filter").change(function (e) {
            var value = $(this).val();

            let old_url_clients = document.location.href;
            let first_pos = old_url_clients.indexOf('user_id=');

            if (first_pos === -1) {
                document.location.href = window.location.href + '?user_id=' + value;
            } else {
                document.location.href = old_url_clients.substr(0, first_pos + 8) + value;
                //+ old_url_clients.substr(first_pos+9)
            }
            // document.location.href = window.location.href + '?user_id=' + value;

        });

        $('.crm-find-product-button').click(function (e) {

            var find_product = $('.crm-find-product').val();

            find_product.toLowerCase();
            let old_url_product = document.location.href;
            let first_pos_product = old_url_product.indexOf('prod=');
            if (first_pos_product === -1) {
                document.location.href = window.location.href + '?prod=' + find_product.toLowerCase();
            } else {
                document.location.href = old_url_product.substr(0, first_pos_product + 5) + find_product.toLowerCase();
            }


        });

        $('.crm-set-currency').change(function (e) {
            let bankAccount = $('.crm-set-currency').val();
            let url = location.origin + '/bank_accounts/' + bankAccount;

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    // console.log(data.bankAccount);
                    let currency = data.bankAccount.currency;
                    console.log(currency.character_code);

                    let elCurrency = document.getElementById('currency_character_code');
                    elCurrency.value = currency.character_code;

                    let elCurrency_id = document.getElementById('currency_id');
                    elCurrency_id.value = currency.id;

                    let now_date = new Date().toLocaleDateString('en-ca');
                    url = location.origin + '/rate_find/' + currency.id + '/' + now_date;

                    console.log(url);
                    return fetch(url);
                })
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    let elRate = document.getElementById('rate');
                    elRate.value = data.rate;

                    let elScale = document.getElementById('scale');
                    elScale.value = data.scale;
                })
        });

        $('.crm-set-product').change(function (e) {
            let product_id = $('.crm-set-product').val();
            let url = location.origin + '/products/' + product_id;

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    //console.log(data);
                    let elPrice = document.getElementById('price');
                    elPrice.value = data.price;
                    // надо сделать пересчет цены в валюту заказа
                    let elPriceCur = document.getElementById('price_cur');
                    let rate = document.getElementById('rate').value;
                    let scale = document.getElementById('scale').value;

                    let newPrice = data.price * 1 * scale / rate * 1;
                    elPriceCur.value = newPrice.toFixed(3);
                })
        });

        $('.crm-laravel-add-product-orders').click(function (e) {
            e.preventDefault();
            var tbody = document.getElementById('crm-laravel-table').getElementsByTagName("tbody")[0];
            var row = document.createElement("tr");
            var td1 = document.createElement("td");


            let product_id = document.getElementById('crm-set-product').value;
            let url = location.origin + '/products/' + product_id;
            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    td1.appendChild(document.createTextNode(data.name));
                    el = document.createElement('input');
                    el.value = product_id;
                    el.setAttribute('type', 'hidden');
                    el.setAttribute('name', "product_id[]");
                    td1.appendChild(el);


                })
            let quantity = document.getElementById('quantity').value;
            var td2 = document.createElement("td");
            td2.appendChild (document.createTextNode(quantity));
            el = document.createElement('input');
            el.value = quantity;
            el.setAttribute('type', 'hidden');
            el.setAttribute('name', "quantity[]");
            td2.appendChild(el);

            var td3 = document.createElement("td");
            let price_cur = document.getElementById('price_cur').value;
            td3.appendChild (document.createTextNode(price_cur));
            el = document.createElement('input');
            el.value = price_cur;
            el.setAttribute('type', 'hidden');
            el.setAttribute('name', "price_cur[]");
            td3.appendChild(el);

            var td4 = document.createElement("td");
            let total = document.getElementById('price').value * quantity;
            td4.appendChild (document.createTextNode(total));
            el = document.createElement('input');
            el.value = total;
            el.setAttribute('type', 'hidden');
            el.setAttribute('name', "total[]");
            td4.appendChild(el);


            //var td5 = document.createElement("td");
            //let total_cur = document.getElementById('price_cur').value * quantity;
            //td5.appendChild (document.createTextNode(total_cur));
            var td5 = document.createElement("td");
            let total_cur = document.getElementById('price_cur').value * quantity;
            td5.appendChild (document.createTextNode(total_cur));

            el = document.createElement('input');
            el.value = total_cur;
            el.setAttribute('type', 'hidden');
            el.setAttribute('name', "total_cur[]");
            td5.appendChild(el);

            var td6 = document.createElement("td");
            el = document.createElement('input');
            el.value = document.getElementById('price').value;
            el.setAttribute('type', 'hidden');
            el.setAttribute('name', "price[]");
            td6.appendChild(el);


            row.appendChild(td1);
            row.appendChild(td2);
            row.appendChild(td3);
            row.appendChild(td4);
            row.appendChild(td5);
            row.appendChild(td6);
            tbody.appendChild(row);
        });

        /*$('.crm-find-rate').change(function (e){

            var currency = $('.crm-find-rate').val();
            var now_date = new Date().toLocaleDateString('en-ca');
            let url = location.origin + '/rate_find/'+currency+'/' + now_date;

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {

                    let elRate = document.getElementById('rate');
                    elRate.value = data.rate;

                    let elScale = document.getElementById('scale');
                    elScale.value = data.scale;

                })

        }); */
    });
})(jQuery);
