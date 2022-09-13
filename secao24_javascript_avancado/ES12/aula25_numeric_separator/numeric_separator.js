//permite usar o _ em um valor numérico, pra melhorar a legibilidade

//inteiro
let num1 = 1000000000000 //1 trilhão
console.log(num1);

num1 = 1_000_000_000_000 //1 trilhão
console.log(num1);

//valores iguais

//decimais
let num2 = 1_725_430.25
console.log(num2);

//Binários
let b = 0b1010_1010_0100
console.log(b);

//hexadecimal
let h = 0xA_B_C_D_E_F
console.log(h);

//octal
let o = 0o2_3_3_5
console.log(o);

//restrições
//let t1 = 100__000 (usar 2 vezes seguidas)
//let t2 = 0_5 (usar o 0 na frente)
//let t3 = 200_000_ (usar no final)