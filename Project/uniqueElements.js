function uniqueElements(arr) {
    const result = {};

    for (const item of arr) {
        const key = String(item);
        if (result[key]) {
            result[key] += 1
        } else {
            result[key] = 1
        }
    }
    return result
}

console.log(uniqueElements(['привет', 'hello', 1, '1']))