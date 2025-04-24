let isPrime = false

function isPrimeNumber(number) {
    if (typeof(number) == 'number') {
        number = [number]
    }
    if (typeof(number) == 'number' || typeof(number) == 'object') {
        for (elt of number) {
            if (typeof(elt) == 'number') {
                for (let i = 2; i <= elt; i++) {
                    isPrime = true
                    for (let j = 2; j < i; j++) {
                        if (i % j == 0) {
                            isPrime = false
                            break
                        }
                    }
                }
                if (isPrime) {
                    console.log(elt, "простое число")
                } else {
                    console.log(elt, "непростое число")
                }
            } else {
                console.log('Элемент массива не соответсвует типу number')
            }
        }
    } else {
        console.log("Ошибка входной тип не соотвествует number или object")
    }
}

let n = 1

isPrimeNumber(n)