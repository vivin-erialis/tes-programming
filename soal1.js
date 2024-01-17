function formSmallestNumber(sequence) {
    let result = [];
    let currentDigit = 1;
  
    for (let i = 0; i < sequence.length; i++) {
      if (sequence[i] === 'M') {
        result.push(currentDigit);
        currentDigit+1;
      } else if (sequence[i] === 'N') {
        result.unshift(currentDigit);
        currentDigit-1;
      }
    }
  
    return parseInt(result.join(''));
  }

  console.log(formSmallestNumber('MNMN'))