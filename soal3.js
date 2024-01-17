function jumlahBotol(target, capacities, currentSolution, bestSolution) {
  if (target === 0) {
      if (currentSolution.reduce((sum, count) => sum + count, 0) < bestSolution.reduce((sum, count) => sum + count, 0)) {
          bestSolution.splice(0, bestSolution.length, ...currentSolution);
      }
      return;
  }

  for (let i = 0; i < capacities.length; i++) {
      const capacity = capacities[i];
      if (capacity <= target) {
          currentSolution[i]++;
          jumlahBotol(target - capacity, capacities, currentSolution, bestSolution);
          currentSolution[i]--;
      }
  }
}

const targetAir = 100;
const bottleCapacities = [5, 7, 11];
const currentSolution = [0, 0, 0];
const bestSolution = Array.from({ length: bottleCapacities.length }, () => Infinity);

jumlahBotol(targetAir, bottleCapacities, currentSolution, bestSolution);

// Output
console.log("Solusi Terbaik:");
bestSolution.forEach((count, i) => {
  console.log(`Botol ${i + 1} = ${count}`);
});
console.log(`Total botol: ${bestSolution.reduce((sum, count) => sum + count, 0)} `);
console.log(`Total air yang ditampung: ${targetAir} liter`);
