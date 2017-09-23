var arr = [
    {
      name: 'Clark Kent',
      alterEgo: 'Superman',
      gender: 'Male',
      powers: ['super human strength', 'flight', 'x-ray vision', 'heat vision']
    },
    {
      name: 'Barry Allen',
      alterEgo: 'The Flash',
      gender: 'Male',
      powers: ['super speed', 'phasing', 'time travel', 'dimensional travel']
    },
    {
      name: 'Diana Prince',
      alterEgo: 'Wonder Woman',
      gender: 'Female',
      powers: ['super human strength', 'super human reflexes', 'super human agility', 'flight']
    },
    {
      name: 'Bruce Banner',
      alterEgo: 'The Hulk',
      gender: 'Male',
      powers: ['super human strength', 'thunder clap', 'super healing factor']
    },
    {
      name: 'Wade Wilson',
      alterEgo: 'Deadpool',
      gender: 'Male',
      powers: ['super healing factor', 'super human agility']
    },
    {
      name: 'Jean Grey',
      alterEgo: 'Phoenix',
      gender: 'Female',
      powers: ['telepathy', 'telekinesis', 'rearrange matter at will']
    },
    {
      name: 'Wanda Maximoff',
      alterEgo: 'Scarlet Witch',
      gender: 'Female',
      powers: ['reality manipulation', 'astral projection', 'psionic']
    }
];

/**
 *  Alter Ego Filter
 * 
 *  I've just heard and learn how to use this fat arrow thingy and wow.
 */
// getAlterEgo = (list) => list.alterEgo
const heroList = arr.map(getAlterEgo = (list) => list.alterEgo);

console.log(heroList);

/**
 *  Power List
 * 
 *  Sorry, gw kayanya butuh belajar ES6 fat arrow lebih jauh untuk memperpendek kodingan dibawah. >_>
 *  Is it possible to chain these codes?
 */
// getPower = (list) => list.powers;

const powerList = arr.map(getPower = (list) => list.powers); // Get all the arrays inside an object

const combinedPowerList = powerList.reduce((prev, curr) =>prev.concat(curr)); // Combine them using reduce

const mergedPowerList = [...new Set(combinedPowerList)]; // Only take unique values

console.log(mergedPowerList.sort()); // Sort the result by alphabet

/**
 *  isMale heroes
 * 
 *  Sama seperti get Alter Ego di atas tapi langsung dimasukan kedalam console.log
 */
console.log(maleHeroes = arr.filter(isMale = (list) => list.gender === 'Male'));

/**
 *  Group by genders
 */
Array.prototype.groupBy = function(prop) {
    return this.reduce(function(groups, item) {
      let val = item[prop]; // Get value in property
      groups[val] = groups[val] || []; // Check and add new array
      groups[val].push(item); // Add item to new array
      return groups; // return updated accumulator to be used
    }, {});
}
  
console.log(byGender = arr.groupBy('gender'));

