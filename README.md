Overview

This program was written in 100% PHP v. 7.0 with only the minimal tooling for debug/testing purposes. Therefore, setup on your environment should be fairly straightforward. For reference, I use Linux/PHPStorm as my core platform and IDE.

Here are my primary tools/libraries:
- PHP 7.0
- Athena2 Apache localhost
- PHPStorm IDE
- <a href="https://phpunit.de/getting-started.html">PHPUnit Unit Testing</a>
- <a href="https://xdebug.org/docs/">XDebug for front end and integration testing</a>

I've added links for the bottom two for further installation and setup instructions

Assumptions
- user is entering searches that require no sanitization, they come through in string format
- the given campsites are the total sum  of the searchable inventory
- the results given by the program would be sent to a prettier front end display

Approach

I identified 3 primary needs: a search engine that works and gives the desired results, a structure that lends itself to OOP principles, and tests that will anticipate data inputs (especially those other than that directly provided). I'm a brainstormer, and since I don't have a whiteboard at the moment, I just used a stack of blank computer paper. It was here that I started sketching out the basic gist of each priority. 

As far as the search engine was concerned, I needed to understand what the data looked like and then figure out the fundamental math behind it. In addition to writing some of the data down in a list, I also drew out diagrams to represent dates and how they may overlap or touch one another--at one point I used a Google calendar to visually understand gapRules. I then moved on to generating data on the frontend, via data dumps and decoding it into PHP for further manipulation. Using this information, I built the meat of the search engine right on the "front end" (index.php) until it gave me the desired results. Even so, this was as far as I see it an intense brainstorming session, since I still needed to do a lot of refactoring and testing before being satisfied with the end results.
 
 It was from here that I began to focus more intently on refactoring and rewriting my proof of concept. For me, there are a number of considerations that go into this, but the most important is writing really high-quality OOP code. Honestly, I see perfecting OOP as a goal that takes a lifetime to learn, but I really, really love improving my abilities and learning how to design it better. At a minimum, I strove to create classes that made sense with encapsulation and testability especially in mind. 
 
 Finally, testing. Sure, I'm used to plenty of that console.log or var_dump malarkey, but I know the real power is in unit and integration testing. It's really the only way for me to make sure a program isn't just parroting back the perfect use case I've given it, and it often points out bugs that I would never have otherwise noticed. Ideally in the future, I would like to start unit testing earlier, but I am still relatively new with it and want to work on the concept of TDD. About half my tests are basic, making sure that the data I'm expecting to receive from various methods is correct. The other half were explorations of edge cases that were not in the original specs, but I felt were useful in writing a program optimized for maintainability and expandability.
 
 If you'd like to see more of my process and the details, I invite you to examine each of my commits and the comments. Also, I went through all the site files and made sure to add ample commentary to make reading my code a lot easier.
 
 Finally, there are at least 10 more optimizations I've noticed possible, and at least as many tests to get them started. But alas, there is only so much time, so let call this a beta and tackle it on the next sprint together :-)