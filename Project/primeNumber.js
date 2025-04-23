let isPrime = false
function isPrimeNumber(number){
    for (let i = 2; i <= number; i++) {
        isPrime = true
        for (let j = 2; j < i; j++) {
            if (i % j == 0) {
                isPrime = false
                break
            }
        }
    }
    return isPrime
}

let n = [1, 2, 3, 4, 5, 6, '7', 8, 9, 10, 11]
if (typeof(n) == 'number'){
    n = [n]
}
if (typeof(n) == 'number' || typeof(n) == 'object'){
    for (elt of n){
        if (typeof(elt) == 'number') {
            if (isPrimeNumber(elt)){
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
