function mergeObjects(object1, object2) {
    let mergedObject = {};
    for (key in object1) {
        mergedObject[key] = object1[key]
    }
    for (key in object2) {
        mergedObject[key] = object2[key]
    }
    return mergedObject
}

console.log(mergeObjects({apples: 1, bananas: 3}, {cucumbers: 57, apples: 6, coconuts: 0}))