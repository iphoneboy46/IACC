export default function RangePriceModule() {
    const rangeInputs = document.querySelectorAll('.range-input input')
    const progress = document.querySelector('.range-slider .progress')
    const priceMin = document.querySelector('.range-item.min .price')
    const priceMax = document.querySelector('.range-item.max .price')

    let priceGap = 1000000;
    if (rangeInputs && progress) {
        let minVal = parseInt(rangeInputs[0].value)
        let maxVal = parseInt(rangeInputs[1].value)
        progress.style.left = (minVal / rangeInputs[0].max) * 100 + '%';
        progress.style.right = 100 - (maxVal / rangeInputs[1].max) * 100 + '%';
        rangeInputs.forEach(item => {
            item.addEventListener('input', (e) => {
                let minVal = parseInt(rangeInputs[0].value)
                let maxVal = parseInt(rangeInputs[1].value)
                if (maxVal - minVal < priceGap) {
                    if (e.target.className === 'range-min') {
                        rangeInputs[0].value = maxVal - priceGap;
                    } else {
                        rangeInputs[1].value = minVal + priceGap;
                    }
                } else {
                    progress.style.left = (minVal / rangeInputs[0].max) * 100 + '%';
                    progress.style.right = 100 - (maxVal / rangeInputs[1].max) * 100 + '%';
                }

            })
        })
        rangeInputs[0].addEventListener('input', () => {
            let minVal = parseInt(rangeInputs[0].value).toLocaleString('it-IT', { style: 'currency', currency: 'đ' });
            priceMin.innerHTML = minVal

        })
        rangeInputs[1].addEventListener('input', () => {
            let maxVal = parseInt(rangeInputs[1].value).toLocaleString('it-IT', { style: 'currency', currency: 'đ' });
            priceMax.innerHTML = maxVal;
        })

    }
}