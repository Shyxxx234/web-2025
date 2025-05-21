function uniqueElements(arr) {
    let result = {}
    for (let item of arr) {
        const key = String(item);
        if (key in result) {
            result[key] += 1
        } else {
            result[key] = 1
        }
    }
    return result
}

console.log(uniqueElements(['привет', 'hello', 1, '1']))