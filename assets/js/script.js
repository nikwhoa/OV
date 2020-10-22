/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

let link = document.getElementsByClassName('target-active-link');
let url = document.URL;
let cardUrl = 'https://theoversized.com/cart/';
let cardUrlTwo = 'https://theoversized.com/checkout/'



if (url == 'https://theoversized.com/catalog/') {
    link[0].className = 'active';
}
if (url === cardUrl) {
    link[1].className = 'active';
}

let large = document.querySelectorAll('.catalog-products .button-variable-item-large');
let medium = document.querySelectorAll('.catalog-products .button-variable-item-medium');
let small = document.querySelectorAll('.catalog-products .button-variable-item-small');
let addToCartButton = document.querySelectorAll('.catalog-products .woocommerce-variation-add-to-cart');


    // for (let q = 0; q < large.length; q++) {
    //         large[q].addEventListener('click', function () {
    //         medium[q].classList.toggle("show-variations");
    //         small[q].classList.toggle("show-variations");
    //         addToCartButton[q].classList.toggle("show-variations-margin");
    //     });

        //     for (let q = 0; q < small.length; q++) {
        //     small[q].addEventListener('click', function () {
        //         large[q].style.display = 'flex';
        // medium[q].style.display = 'flex';
        // addToCartButton[q].style.marginTop = '80px';

            // medium[q].classList.toggle("show-variations");
            // large[q].classList.toggle("show-variations");
            // addToCartButton[q].classList.toggle("show-variations-margin");
        // });
        // medium[q].addEventListener('click', function () {
        //     large[q].classList.toggle("show-variations");
        //     small[q].classList.toggle("show-variations");
        //     addToCartButton[q].classList.toggle("show-variations-margin");
        // })
    // }


    // large[0].classList.toggle("show-variations");
    // medium[0].classList.toggle('show-variations');
    // small[0].classList.toggle('show-variations');




// let large = document.querySelectorAll('.button-variable-item-large');
// let medium = document.querySelectorAll('.button-variable-item-medium');
// let small = document.querySelectorAll('.button-variable-item-small');
// let addToCartButton = document.querySelectorAll('.catalog-products .woocommerce-variation-add-to-cart');
//
// for (let q = 0; q < large.length; q++) {
//     large[q].addEventListener('click', function () {
//         medium[q].style.display = 'flex';
//         small[q].style.display = 'flex';
//         addToCartButton[q].style.marginTop = '80px';
//     })
// }

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});

    /* .flex-control-nav */
/*
let photoNumbers = document.getElementsByClassName('flex-control-nav');
// photoNumbers[0].children[1].style.display = 'none';
console.log(photoNumbers[0].children[1]);*/
