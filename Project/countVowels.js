const vowels = ['у', 'е', 'ы', 'а', 'о', 'я', 'и', 'ю', 'ё', 'У', 'Е', 'Ы', 'А', 'О', 'Э', 'Я', 'И', 'Ю']
function countVowels(str){
    counter = 0
    for (elt of str){  
        if (vowels.includes(elt)){
            counter += 1    
        }
    }
    return counter
}

message = "Привет, мир"
counter = countVowels(message)
console.log(counter)