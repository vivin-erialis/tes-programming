function generateNumber(sequence) {
  if (sequence.length > 8) {
    return "Jumlah karakter melebihi batas maksimum";
  }
  let result = "";
  let currentDigit = 1;

  for (let i = 0; i < sequence.length; i++) {
    if (sequence[i] === "M") {
      result += currentDigit;
      currentDigit++;
    }
    else if (sequence[i] === "N") {
      result = currentDigit + result;
      currentDigit++;
    }
  }

  if (sequence[sequence.length - 1] === "M") {
    result += currentDigit;
  } else if (sequence[sequence.length - 1] === "N") {
    result = currentDigit + result;
  }

  return result;
}

// Output
console.log(generateNumber("M"));        // Output: 21
console.log(generateNumber("N"));        // Output: 12
console.log(generateNumber("MM"));       // Output: 321
console.log(generateNumber("NN"));       // Output: 123
console.log(generateNumber("MNMN"));     // Output: 21435
console.log(generateNumber("NNMMM"));    // Output: 126543
console.log(generateNumber("MMNMMNNM")); // Output: 321654798
// Output Error
console.log(generateNumber("MMMMMMMMM")); 