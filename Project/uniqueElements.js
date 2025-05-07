function uniqueElements(arr) {
    const result = {}
    for (item of arr) {
        const key = String(item);
        if (result[key] in result) {
            result[key] += 1
        } else {
            result[key] = 1
        }
    }
    return result
}

console.log(uniqueElements(['привет', 'hello', 1, '1']))