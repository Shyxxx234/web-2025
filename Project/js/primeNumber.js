function isPrimeNumber(number) {
    let isPrime = false
    if (typeof (number) == 'number') {
        number = [number]
    }
    if (typeof (number) == 'object' && Object.keys(number).length != 0) {
        for (el of number) {
            if (Number.isInteger(el)) {
                if (el >= 0) {
                    for (i = 2; i <= el; i++) {
                        isPrime = true
                        if (el % i == 0) {
                            isPrime = false
                            break
                        }
                    }
                    if (isPrime) {
                        console.log(el, "простое число")
                    } else {
                        console.log(el, "непростое число")
                    }
                } else {
                    console.log("Введеное число отрицательное")
                }
            } else {
                console.log('Элемент массива не соответсвует типу integer')
            }
        }
    } else {
        console.log("Входной тип не соотвествует типу integer или object, или переданные данные являются пустым объектом")
    }
}

const n = [1, 2.1, -3, "s", 5, 6, '7', 8, 9, 10]

isPrimeNumber(n)
isPrimeNumber(true)