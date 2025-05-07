const vowels = ['у', 'е', 'ы', 'а', 'о', 'я', 'и', 'ю', 'ё', 'У', 'Е', 'Ы', 'А', 'О', 'Э', 'Я', 'И', 'Ю']

function countVowels(str) {
    counter = 0
    for (elt of str) {
        if (vowels.includes(elt)) {
            counter += 1
        }
    }
    return counter
}

const message = "Привет, мир"
console.log(countVowels(message))