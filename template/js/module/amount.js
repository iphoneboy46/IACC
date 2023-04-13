export default function Amount() {
    try {
        var event = new Event("change");
        const count = document.querySelectorAll('.qtyJS')
        if (count) {
            count.forEach(item => {
                const input = item.querySelector('.amount');
            })
        }
        document.addEventListener('click', (e) => {
            const count = e.target.closest('.qtyJS');
            const countBtnPlus = e.target.closest('.plus')
            const countBtnMinus = e.target.closest('.minus');
            if (count) {
                const countInput = count.querySelector('.amount');
                if (countBtnPlus) {
                    // if (parseInt(countInput.value) < parseInt(countInput.max)) {
                    // }
                    countInput.value++;
                    countInput.dispatchEvent(event);
                    $(countInput).trigger('change');
                    $('.mona-update-cart-js').removeAttr('disabled');
    
                }
                if (countBtnMinus) {
                    if (parseInt(countInput.value) > 1) {
                        countInput.value--;
                        countInput.dispatchEvent(event);
                        $(countInput).trigger('change');
                        $('.mona-update-cart-js').removeAttr('disabled');
                    }
                }
    
            }
        })
    } catch (error) {
        console.log(error)
    }
}