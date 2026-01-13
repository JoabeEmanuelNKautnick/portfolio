/**
 * Quiz CiberSec - JavaScript
 */

(function() {
    'use strict';
    
    // Estado do Quiz
    const state = {
        questions: [],
        currentQuestion: 0,
        score: 0,
        answered: false,
        selectedAnswer: null,
        lang: 'pt'
    };
    
    // Elementos DOM
    const elements = {
        startScreen: null,
        quizScreen: null,
        resultScreen: null,
        questionText: null,
        optionsContainer: null,
        progressBar: null,
        questionCounter: null,
        nextBtn: null,
        scoreDisplay: null,
        feedbackContainer: null
    };
    
    /**
     * Inicializa o quiz
     */
    async function init() {
        cacheElements();
        detectLanguage();
        await loadQuestions();
        bindEvents();
    }
    
    /**
     * Cacheia elementos DOM
     */
    function cacheElements() {
        elements.startScreen = document.getElementById('quiz-start');
        elements.quizScreen = document.getElementById('quiz-game');
        elements.resultScreen = document.getElementById('quiz-result');
        elements.questionText = document.getElementById('question-text');
        elements.optionsContainer = document.getElementById('options-container');
        elements.progressBar = document.getElementById('progress-bar');
        elements.questionCounter = document.getElementById('question-counter');
        elements.nextBtn = document.getElementById('next-btn');
        elements.scoreDisplay = document.getElementById('score-display');
        elements.feedbackContainer = document.getElementById('feedback-container');
    }
    
    /**
     * Detecta idioma da página
     */
    function detectLanguage() {
        const urlParams = new URLSearchParams(window.location.search);
        state.lang = urlParams.get('lang') || 'pt';
        if (!['pt', 'en', 'es', 'de'].includes(state.lang)) {
            state.lang = 'pt';
        }
    }
    
    /**
     * Carrega perguntas do JSON
     */
    async function loadQuestions() {
        try {
            const response = await fetch('questions.json');
            const data = await response.json();
            state.questions = shuffleArray(data.questions).slice(0, 10); // 10 perguntas aleatórias
        } catch (error) {
            console.error('Erro ao carregar perguntas:', error);
        }
    }
    
    /**
     * Embaralha array (Fisher-Yates)
     */
    function shuffleArray(array) {
        const arr = [...array];
        for (let i = arr.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [arr[i], arr[j]] = [arr[j], arr[i]];
        }
        return arr;
    }
    
    /**
     * Vincula eventos
     */
    function bindEvents() {
        const startBtn = document.getElementById('start-quiz-btn');
        if (startBtn) {
            startBtn.addEventListener('click', startQuiz);
        }
        
        if (elements.nextBtn) {
            elements.nextBtn.addEventListener('click', nextQuestion);
        }
        
        const restartBtn = document.getElementById('restart-quiz-btn');
        if (restartBtn) {
            restartBtn.addEventListener('click', restartQuiz);
        }
    }
    
    /**
     * Inicia o quiz
     */
    function startQuiz() {
        state.currentQuestion = 0;
        state.score = 0;
        state.answered = false;
        
        elements.startScreen.classList.add('hidden');
        elements.quizScreen.classList.remove('hidden');
        elements.resultScreen.classList.add('hidden');
        
        showQuestion();
    }
    
    /**
     * Exibe pergunta atual
     */
    function showQuestion() {
        state.answered = false;
        state.selectedAnswer = null;
        
        const question = state.questions[state.currentQuestion];
        const lang = state.lang;
        
        // Atualiza texto da pergunta
        elements.questionText.textContent = question.question[lang];
        
        // Atualiza contador
        elements.questionCounter.textContent = `${state.currentQuestion + 1} / ${state.questions.length}`;
        
        // Atualiza barra de progresso
        const progress = ((state.currentQuestion) / state.questions.length) * 100;
        elements.progressBar.style.width = `${progress}%`;
        
        // Cria opções
        elements.optionsContainer.innerHTML = '';
        question.options[lang].forEach((option, index) => {
            const button = document.createElement('button');
            button.className = 'quiz-option';
            button.textContent = option;
            button.dataset.index = index;
            button.addEventListener('click', () => selectAnswer(index, question));
            elements.optionsContainer.appendChild(button);
        });
        
        // Esconde feedback e botão next
        elements.feedbackContainer.classList.add('hidden');
        elements.nextBtn.classList.add('hidden');
        
        // Adiciona badge de dificuldade
        const difficultyBadge = document.getElementById('difficulty-badge');
        if (difficultyBadge) {
            difficultyBadge.textContent = question.difficulty === 'hard' ? '🔴 Hard' : '🟡 Medium';
            difficultyBadge.className = `difficulty-badge ${question.difficulty}`;
        }
    }
    
    /**
     * Seleciona resposta
     */
    function selectAnswer(index, question) {
        if (state.answered) return;
        
        state.answered = true;
        state.selectedAnswer = index;
        
        const options = elements.optionsContainer.querySelectorAll('.quiz-option');
        const isCorrect = index === question.correct;
        
        // Marca opções
        options.forEach((opt, i) => {
            opt.disabled = true;
            if (i === question.correct) {
                opt.classList.add('correct');
            } else if (i === index && !isCorrect) {
                opt.classList.add('incorrect');
            }
        });
        
        // Atualiza pontuação
        if (isCorrect) {
            state.score++;
        }
        
        // Mostra feedback
        showFeedback(isCorrect, question);
        
        // Mostra botão next
        elements.nextBtn.classList.remove('hidden');
        elements.nextBtn.textContent = state.currentQuestion === state.questions.length - 1 
            ? getTranslation('finish') 
            : getTranslation('next');
    }
    
    /**
     * Mostra feedback da resposta
     */
    function showFeedback(isCorrect, question) {
        const lang = state.lang;
        const feedbackTitle = elements.feedbackContainer.querySelector('.feedback-title');
        const feedbackText = elements.feedbackContainer.querySelector('.feedback-text');
        
        feedbackTitle.textContent = isCorrect ? getTranslation('correct') : getTranslation('incorrect');
        feedbackTitle.className = `feedback-title ${isCorrect ? 'correct' : 'incorrect'}`;
        feedbackText.textContent = question.explanation[lang];
        
        elements.feedbackContainer.classList.remove('hidden');
    }
    
    /**
     * Próxima pergunta
     */
    function nextQuestion() {
        state.currentQuestion++;
        
        if (state.currentQuestion >= state.questions.length) {
            showResults();
        } else {
            showQuestion();
        }
    }
    
    /**
     * Mostra resultados
     */
    function showResults() {
        elements.quizScreen.classList.add('hidden');
        elements.resultScreen.classList.remove('hidden');
        
        const percentage = Math.round((state.score / state.questions.length) * 100);
        elements.scoreDisplay.textContent = `${state.score}/${state.questions.length} (${percentage}%)`;
        
        // Mensagem baseada na pontuação
        const messageEl = document.getElementById('result-message');
        if (messageEl) {
            if (percentage >= 80) {
                messageEl.textContent = '🏆 Excelente! Você é um especialista!';
            } else if (percentage >= 60) {
                messageEl.textContent = '👍 Bom trabalho! Continue estudando!';
            } else {
                messageEl.textContent = '📚 Continue praticando! A segurança é essencial!';
            }
        }
        
        // Atualiza barra de progresso para 100%
        elements.progressBar.style.width = '100%';
    }
    
    /**
     * Reinicia quiz
     */
    async function restartQuiz() {
        await loadQuestions();
        startQuiz();
    }
    
    /**
     * Traduções simples
     */
    function getTranslation(key) {
        const translations = {
            pt: { next: 'Próxima', finish: 'Finalizar', correct: '✓ Correto!', incorrect: '✗ Incorreto!' },
            en: { next: 'Next', finish: 'Finish', correct: '✓ Correct!', incorrect: '✗ Incorrect!' },
            es: { next: 'Siguiente', finish: 'Finalizar', correct: '✓ ¡Correcto!', incorrect: '✗ ¡Incorrecto!' },
            de: { next: 'Weiter', finish: 'Beenden', correct: '✓ Richtig!', incorrect: '✗ Falsch!' }
        };
        return translations[state.lang]?.[key] || translations['pt'][key];
    }
    
    // Inicializa quando DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
