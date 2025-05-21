const lowercase = 'abcdefghijklmnopqrstuvwxyz'
const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
const numbers = '0123456789'
const specials = '!@#$%^&*()_+-=[]{}|:,.<>?'

function generatePassword(length) {
    if (length >= 4) {
        const randomLower = lowercase[Math.floor(Math.random() * lowercase.length)]
        const randomUpper = uppercase[Math.floor(Math.random() * uppercase.length)]
        const randomNumber = numbers[Math.floor(Math.random() * numbers.length)]
        const randomSpecial = specials[Math.floor(Math.random() * specials.length)]
        const allChars = lowercase + uppercase + numbers + specials
        let password = [randomLower, randomUpper, randomNumber, randomSpecial]
        for (let i = 4; i < length; i++) {
            password.push(allChars[Math.floor(Math.random() * allChars.length)])
        }
        password = password.sort(() => Math.random() - 0.5)
        return password.join('')
    } else {
        return "Длина запрашиваемого пароля должна быть больше 4 символов"
    }
}

console.log(generatePassword(6))
console.log(generatePassword(12))