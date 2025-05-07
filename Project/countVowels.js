const vowels = ['у', 'е', 'ы', 'а', 'о', 'я', 'и', 'ю', 'ё', 'э', 'У', 'Е', 'Ы', 'А', 'О', 'Э', 'Я', 'И', 'Ю', 'Ё']

function countVowels(str) {
    const foundVowels = []
    for (elt of str) {
        if (vowels.includes(elt)) {
            foundVowels.push(elt)
        }
    }
    const count = foundVowels.length
    const vowelsList = ' (' + foundVowels.join(', ') + ')'
    return String(count) + vowelsList
}

const message = "Привет, мир"
console.log(countVowels(message)) 