function mapObject(obj, callback) {
    let newMap = {}
    for (key in obj) {
        newMap[key] = callback(obj[key])
    }
    return newMap
}

const nums = { a: 1, b: 2, c: 3 }
console.log(mapObject(nums, x => x ** 2)) 