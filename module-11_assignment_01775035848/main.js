function multiplicationTable(num) {
  for (let i = 1; i <= 10; i++) {
    let product = num * i;
    console.log(`${num} x ${i} = ${product}`);
  }
}

// Example usage:
multiplicationTable(5);
multiplicationTable(7);
multiplicationTable(12);