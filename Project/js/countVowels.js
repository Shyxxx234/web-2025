const vowels = ['у', 'е', 'ы', 'а', 'о', 'я', 'и', 'ю', 'ё', 'э', 'У', 'Е', 'Ы', 'А', 'О', 'Э', 'Я', 'И', 'Ю', 'Ё']

function countVowels(str) {
    let foundVowels = []
    for (element of str) {
        if (vowels.includes(element)) {
            foundVowels.push(element)
        }
    }
    const count = foundVowels.length
    const vowelsList = ' (' + foundVowels.join(', ') + ')'
    return String(count) + vowelsList
}

const message = "Привет, мир"
console.log(countVowels(message)) 