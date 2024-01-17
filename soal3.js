function findMinBottles(target, capacities, currentSolution, bestSolution) {
  if (target === 0) {
      // Jika target sudah terpenuhi, periksa apakah solusi saat ini lebih baik
      if (currentSolution.reduce((sum, count) => sum + count, 0) < bestSolution.reduce((sum, count) => sum + count, 0)) {
          bestSolution.splice(0, bestSolution.length, ...currentSolution);
      }
      return;
  }

  for (let i = 0; i < capacities.length; i++) {
      const capacity = capacities[i];
      if (capacity <= target) {
          // Coba menambahkan botol ke solusi
          currentSolution[i]++;
          // Rekursif untuk sisa target
          findMinBottles(target - capacity, capacities, currentSolution, bestSolution);
          // Batalkan perubahan agar bisa mencoba solusi lain
          currentSolution[i]--;
      }
  }
}

// Inisialisasi variabel
const targetLiters = 100;
const bottleCapacities = [5, 7, 11];
const currentSolution = [0, 0, 0];
const bestSolution = Array.from({ length: bottleCapacities.length }, () => Infinity);

// Panggil fungsi pencarian
findMinBottles(targetLiters, bottleCapacities, currentSolution, bestSolution);

// Tampilkan hasil
console.log("Solusi Terbaik:");
bestSolution.forEach((count, i) => {
  console.log(`Bottle ${i + 1} = ${count} bottles`);
});
console.log(`Total bottles needed: ${bestSolution.reduce((sum, count) => sum + count, 0)} bottles`);
