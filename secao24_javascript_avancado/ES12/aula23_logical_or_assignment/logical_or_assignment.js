//atribuição se a variável tiver o valor false

//false -> null, undefined, 0, ''
let v1 = 10;
let v2 = undefined; //false
let v3 = null; //false
let v4 = 0; //false
let v5 = ''; //false
let v6 = 'String qualquer'; 

// logical or assignment ||=
v1 ||= 50;
v2 ||= 100; //false
v3 ||= 200; //false
v4 ||= 300; //false
v5 ||= 400; //false
v6 ||= 500;

console.log('V1: ', v1);
console.log('V2: ', v2);
console.log('V3: ', v3);
console.log('V4: ', v4);
console.log('V5: ', v5);
console.log('V6: ', v6);