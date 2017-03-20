Until this is finished, I will add my notes and thoughts as written on my personal whiteboard, to document and track what I'm thinking.

There are 2 primary considerations in completing this: problem solution and optimizations. I will first prioritize finding a solution, then optimzing and refactoring to ensure maintainability and an adherence to OOP.

Solution:

Before doing anything else I should start comparing the search dates, first eliminating those sites with reservation overlap, then those that have gaps that cannot accomodate the search terms given the gap rules. 

The starting point for the solution will be in calculating the existing reservations' gaps and then comparing them to the search terms.

Getting the reservation gaps on each property requires a comparison of each record's end date with the following record's start date. One thing to consider is that although each record as given is chronological, an optimization may include a function that makes sure the records are in chronological order - b/c if they aren't it will render to date diff comp unworkable.

#Optimizations:

- Merge and massage the previous class refactors with the needs for a primary engine that is easily testable

#TODO
- add as much documentation as possible 
- evaluate vars/func's for readability
- reverse/inspect if clauses in reservations loop to see if can be optimized for inverse case
- organize file structure
- add modelParse test for non-json files
- make all test function naming conventions consistent

#Tests
- GenerateAvailability
- Search
- ModelDecodeJSON
- ModelParse

