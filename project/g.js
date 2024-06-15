document.addEventListener('DOMContentLoaded', fetchTriviaData);

        let triviaData = [];
        let userResponses = {};

        function fetchTriviaData() {
            fetch('https://opentdb.com/api.php?amount=10&category=22&difficulty=easy')
                .then(response => response.json())
                .then(data => {
                    triviaData = data.results;
                    displayQuestion(0);
                })
        }

        function displayQuestion(index) {
            const triviaContainer = document.getElementById('trivia');
            triviaContainer.innerHTML = '';

            const question = triviaData[index];
            const triviaItem = document.createElement('div');
            triviaItem.classList.add('trivia-item');
            triviaItem.innerHTML = `
                <h3>Question ${index + 1}</h3>
                <p>${question.question}</p>
                ${[...question.incorrect_answers, question.correct_answer].map(answer => `
                    <label>
                        <input type="radio" name="answer" value="${answer}">
                        ${answer}
                    </label><br>
                `).join('')}
                <button onclick="submitAnswer(${index})">Submit</button>
                <hr>
            `;
            triviaContainer.appendChild(triviaItem);
        }

        function submitAnswer(index) {
            const userAnswer = document.querySelector('input[name="answer"]:checked')?.value;
            if (userAnswer) {
                userResponses[index] = userAnswer;
                if (index < triviaData.length - 1) {
                    displayQuestion(index + 1);
                } else {
                    showResults();
                }
            } else {
                alert("Please select an answer before submitting.");
            }
        }
        function showResults() {
            const triviaContainer = document.getElementById('trivia');
            triviaContainer.innerHTML = '';
        
            const numQuestions = triviaData.length;
        
            const resultsDiv = document.createElement('div');
            resultsDiv.classList.add('results-container');
        
            for (let i = 0; i < numQuestions; i++) {
                const question = triviaData[i];
                const resultItem = document.createElement('div');
                resultItem.classList.add('result-item');
                resultItem.innerHTML = `
                    <h3>Question ${i + 1}</h3>
                    <p>${question.question}</p>
                    <p>Your answer: ${userResponses[i]}</p>
                    <p>Correct answer: ${question.correct_answer}</p>
                    <hr>
                `;
                resultsDiv.appendChild(resultItem);
            }
        
            triviaContainer.appendChild(resultsDiv);
        
            
        }
        
        
        
                
        