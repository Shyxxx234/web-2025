const users = [
  { id: 1, name: "Alice" },
  { id: 2, name: "Bob" },
  { id: 3, name: "Charlie" }
];

function getName(user) {
  return user.name
}

console.log(users.map(user => user.name))
console.log(users.map(getName))