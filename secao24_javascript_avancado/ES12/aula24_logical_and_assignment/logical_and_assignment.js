//atribui valor na var se ela tiver um valor verdadeiro

//true: tudo q não é false (null, undefined, 0, '')

let v1 = 0; //false
let v2 = 1; //true

v1 &&= 'Atribuição é feita se v1 for true'
v2 &&= 'Atribuição é feita se v2 for true'

console.log(v1)
console.log(v2)