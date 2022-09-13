//achatar arrays multidimensionais
let arr = [1, 2, 3, 4, [5, 6, 7, 8], 10, [11, 12, [13, 14, [15, 16]]]];

let arr2 = arr.flat(3); //retorna esse array com apenas 1 dimensão (qnts subníveis o flat vai levar pro nivel principal) (padrão: 1 subnível)
console.log(arr);
console.log(arr2);