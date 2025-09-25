document.addEventListener("DOMContentLoaded", function () {
  // State variables
  let currentText = "";
  let recognition = null;
  let synthesis = window.speechSynthesis;
  let selectedTestItem = null;
  let timerInterval = null;
  let timeLeft = 40;
  let isRecording = false;
  let isSpeaking = false;
  let microphonePermissionGranted = false;
  let isModalOpen = false;
  let practiceStartTime = null;
  let currentQuestionId = null;
  let mediaRecorder = null;
  let audioChunks = [];
  let audioBlob = null;
  let speechStartTime = null;
  let speechEndTime = null;
  
  // Pagination variables
  let currentPage = 1;
  const testsPerPage = 10;
  let allTestItems = [];
  let filteredTestItems = [];

  // DOM Elements
  const textDisplay = document.getElementById("textDisplay");
  const timer = document.getElementById("timer");
  const microphonePermissionBox = document.getElementById("microphonePermissionBox");
  const microphoneHelpBtn = document.getElementById("microphoneHelpBtn");
  const submitBtn = document.getElementById("submitBtn");
  const redoBtn = document.getElementById("redoBtn");
  const translationBtn = document.getElementById("translationBtn");
  const zenPracticeBtn = document.getElementById("zenPracticeBtn");
  const shadowingBtn = document.getElementById("shadowingBtn");
  const oneLineModeBtn = document.getElementById("oneLineModeBtn");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  const searchBtn = document.getElementById("searchBtn");
  const questionSearch = document.getElementById("questionSearch");
  const testItems = document.querySelectorAll(".test-item");
  const testSearch = document.getElementById("testSearch");
  const applyTestBtn = document.getElementById("applyTestBtn");
  const confirmExamBtn = document.getElementById("confirmExamBtn");
  const examInfoForm = document.getElementById("examInfoForm");
  const testedCount = document.getElementById("testedCount");
  const askStageBtn = document.getElementById("askStageBtn");
  const closeTipBtn = document.getElementById("closeTipBtn");
  const studyGuideBtn = document.getElementById("studyGuideBtn");
  const shadowBtn = document.getElementById("shadowBtn");
  const toggleSelector = document.getElementById("toggleSelector");
  const customTextInput = document.getElementById("customTextInput");
  const speakTextBtn = document.getElementById("speakTextBtn");
  const smsContainer = document.getElementById("smsContainer");
  const practiceHistory = document.getElementById("practiceHistory");
  
  // Pagination elements
  const prevPageBtn = document.getElementById("prevPageBtn");
  const nextPageBtn = document.getElementById("nextPageBtn");
  const paginationInfo = document.getElementById("paginationInfo");
  const paginationControls = document.getElementById("paginationControls");
  const testsContainer = document.getElementById("testsContainer");
  const monthlyTestsBtn = document.getElementById("monthlyTestsBtn");
  const weeklyTestsBtn = document.getElementById("weeklyTestsBtn");

  // Initialize the application
  function init() {
    checkMicrophonePermission();
    setupEventListeners();
    setupSpeechRecognition();
    setupModalListeners();
    loadTestedCount();
    loadPracticeHistory();
    showSMS("Welcome to Text-to-Speech Practice", "info");
  }

  // Load tested count from server
  function loadTestedCount() {
    fetch("?action=get_tested_count")
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          testedCount.textContent = data.count;
        }
      })
      .catch((error) => {
        console.error("Error loading tested count:", error);
      });
  }

  // Load practice history from server
  function loadPracticeHistory() {
    fetch("?action=get_history&limit=5")
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          displayPracticeHistory(data.history);
        }
      })
      .catch((error) => {
        console.error("Error loading practice history:", error);
      });
  }

  // Display practice history
  function displayPracticeHistory(history) {
    if (history.length === 0) {
      practiceHistory.innerHTML =
        "<p>No practice history yet. Start practicing to see your results here.</p>";
      return;
    }

    let html = '<div class="list-group">';
    history.forEach((item) => {
      const date = new Date(item.created_at).toLocaleDateString();
      const time = new Date(item.created_at).toLocaleTimeString();
      html += `
            <div class="list-group-item history-item">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Score: ${item.score}/90</h6>
                <small>${date} ${time}</small>
              </div>
              <p class="mb-1">Time: ${item.time_taken}s | Attempt: ${item.attempt}</p>
              <small>Question ID: ${item.question_id || "Custom text"}</small>
            </div>
          `;
    });
    html += "</div>";
    practiceHistory.innerHTML = html;
  }

  // Save practice result to server
  function savePracticeResult(score, userSpeech, timeTaken) {
    const formData = new FormData();
    formData.append("action", "save_result");
    formData.append("question_id", currentQuestionId || 0);
    formData.append("score", score);
    formData.append("time_taken", timeTaken);
    formData.append("feedback", userSpeech);

    fetch(window.location.href, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          showSMS("Practice result saved successfully!", "success");
          loadTestedCount();
          loadPracticeHistory();
        } else {
          showSMS("Failed to save practice result.", "error");
        }
      })
      .catch((error) => {
        console.error("Error saving practice result:", error);
        showSMS("Error saving practice result.", "error");
      });
  }

  // Setup modal event listeners
  function setupModalListeners() {
    const testModal = document.getElementById("testSelectorModal");
    testModal.addEventListener("show.bs.modal", function () {
      isModalOpen = true;
      // Initialize tests when modal opens
      initializeTestItems();
    });
    testModal.addEventListener("hide.bs.modal", function () {
      isModalOpen = false;
    });

    const examModal = document.getElementById("examInfoModal");
    examModal.addEventListener("show.bs.modal", function () {
      isModalOpen = true;
    });
    examModal.addEventListener("hide.bs.modal", function () {
      isModalOpen = false;
    });
  }

  // Initialize test items
  function initializeTestItems() {
    // Get all test items from the DOM
    const testElements = document.querySelectorAll('.test-item');
    allTestItems = Array.from(testElements).map(item => ({
      id: item.dataset.id,
      text: item.dataset.text,
      title: item.textContent.trim(),
      category: getCategoryForItem(item),
      element: item
    }));
    
    filteredTestItems = [...allTestItems];
    
    // Show first page
    currentPage = 1;
    renderTestItems();
    updatePagination();
  }

  // Get category for a test item
  function getCategoryForItem(item) {
    let prevElement = item.previousElementSibling;
    while (prevElement) {
      if (prevElement.classList.contains('category-title')) {
        return prevElement.textContent.trim();
      }
      prevElement = prevElement.previousElementSibling;
    }
    return "Uncategorized";
  }

  // Render test items based on current page
  function renderTestItems() {
    const testsContainer = document.getElementById('testsContainer');
    const paginationInfo = document.getElementById('paginationInfo');
    
    // Clear existing items (except category titles)
    const itemsToRemove = testsContainer.querySelectorAll('.test-item, .pagination-row');
    itemsToRemove.forEach(item => item.remove());
    
    // Calculate items to show
    const startIndex = (currentPage - 1) * testsPerPage;
    const endIndex = Math.min(startIndex + testsPerPage, filteredTestItems.length);
    const currentItems = filteredTestItems.slice(startIndex, endIndex);
    
    // Group items by category
    const itemsByCategory = {};
    currentItems.forEach(item => {
      if (!itemsByCategory[item.category]) {
        itemsByCategory[item.category] = [];
      }
      itemsByCategory[item.category].push(item);
    });
    
    // Render items by category
    Object.keys(itemsByCategory).forEach(category => {
      // Add category title if it doesn't exist
      if (!testsContainer.querySelector(`.category-title[data-category="${category}"]`)) {
        const categoryTitle = document.createElement('h6');
        categoryTitle.className = 'category-title';
        categoryTitle.textContent = category;
        categoryTitle.setAttribute('data-category', category);
        testsContainer.appendChild(categoryTitle);
      }
      
      // Add test items for this category
      itemsByCategory[category].forEach(item => {
        const testItem = document.createElement('div');
        testItem.className = 'test-item';
        testItem.dataset.id = item.id;
        testItem.dataset.text = item.text;
        testItem.textContent = item.title;
        
        testItem.addEventListener('click', function() {
          document.querySelectorAll('.test-item').forEach(i => i.classList.remove('active'));
          this.classList.add('active');
          selectedTestItem = this;
        });
        
        testsContainer.appendChild(testItem);
      });
    });
    
    // Update pagination info
    paginationInfo.textContent = `Showing ${startIndex + 1}-${endIndex} of ${filteredTestItems.length} tests`;
    
    // Show/hide pagination controls
    document.getElementById('paginationControls').style.display = 
      filteredTestItems.length > testsPerPage ? 'flex' : 'none';
  }

  // Update pagination buttons
  function updatePagination() {
    const prevBtn = document.getElementById('prevPageBtn');
    const nextBtn = document.getElementById('nextPageBtn');
    
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === Math.ceil(filteredTestItems.length / testsPerPage);
  }

  // Handle previous page
  function handlePrevPage() {
    if (currentPage > 1) {
      currentPage--;
      renderTestItems();
      updatePagination();
    }
  }

  // Handle next page
  function handleNextPage() {
    if (currentPage < Math.ceil(filteredTestItems.length / testsPerPage)) {
      currentPage++;
      renderTestItems();
      updatePagination();
    }
  }

  // Handle test type selection (Monthly/Weekly)
  function handleTestTypeSelection(type) {
    const monthlyBtn = document.getElementById('monthlyTestsBtn');
    const weeklyBtn = document.getElementById('weeklyTestsBtn');
    
    if (type === 'monthly') {
      monthlyBtn.classList.add('active');
      weeklyBtn.classList.remove('active');
      // Filter for monthly tests
      filteredTestItems = allTestItems.filter(item => 
        item.category !== "Weekly Tests" && item.category !== "Uncategorized"
      );
    } else {
      weeklyBtn.classList.add('active');
      monthlyBtn.classList.remove('active');
      // Filter for weekly tests
      filteredTestItems = allTestItems.filter(item => 
        item.category === "Weekly Tests" || item.id % 2 === 0 // Example filter
      );
    }
    
    currentPage = 1;
    renderTestItems();
    updatePagination();
  }

  // Check if microphone permission is granted
  function checkMicrophonePermission() {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices
        .getUserMedia({ audio: true })
        .then(function (stream) {
          microphonePermissionGranted = true;
          microphonePermissionBox.style.display = "none";
          stream.getTracks().forEach((track) => track.stop());
        })
        .catch(function (err) {
          console.error("Microphone permission denied:", err);
          microphonePermissionGranted = false;
          microphonePermissionBox.style.display = "block";
          showSMS("Microphone access is required for speech practice", "warning");
        });
    } else {
      console.error("getUserMedia not supported");
      microphonePermissionBox.querySelector("p").textContent =
        "Microphone access is not supported in your browser.";
      microphonePermissionBox.style.display = "block";
      showSMS("Your browser does not support microphone access", "error");
    }
  }

  // Setup all event listeners
  function setupEventListeners() {
    // Microphone permission
    microphoneHelpBtn.addEventListener("click", handleMicrophoneHelp);

    // Practice buttons
    submitBtn.addEventListener("click", handleSubmit);
    redoBtn.addEventListener("click", handleRedo);
    translationBtn.addEventListener("click", handleTranslation);
    zenPracticeBtn.addEventListener("click", handleZenPractice);
    shadowingBtn.addEventListener("click", handleShadowing);
    oneLineModeBtn.addEventListener("click", handleOneLineMode);
    prevBtn.addEventListener("click", handlePrevious);
    nextBtn.addEventListener("click", handleNext);
    searchBtn.addEventListener("click", handleSearch);

    // Test selection modal
    testItems.forEach((item) => {
      item.addEventListener("click", function () {
        testItems.forEach((i) => i.classList.remove("active"));
        this.classList.add("active");
        selectedTestItem = this;
      });
    });

    testSearch.addEventListener("input", handleTestSearch);
    applyTestBtn.addEventListener("click", handleApplyTest);

    // Exam info modal
    confirmExamBtn.addEventListener("click", handleConfirmExam);

    // Other buttons
    askStageBtn.addEventListener("click", handleAskStage);
    closeTipBtn.addEventListener("click", handleCloseTip);
    studyGuideBtn.addEventListener("click", handleStudyGuide);
    shadowBtn.addEventListener("click", handleShadow);

    // Custom text input and speak button
    speakTextBtn.addEventListener("click", handleSpeakText);
    customTextInput.addEventListener("input", handleCustomTextInput);
    
    // Pagination event listeners
    prevPageBtn.addEventListener("click", handlePrevPage);
    nextPageBtn.addEventListener("click", handleNextPage);
    
    // Monthly/Weekly selection
    monthlyTestsBtn.addEventListener("click", function() {
      handleTestTypeSelection('monthly');
    });
    weeklyTestsBtn.addEventListener("click", function() {
      handleTestTypeSelection('weekly');
    });

    // Prevent modal from closing when clicking inside
    document.querySelectorAll(".modal").forEach((modal) => {
      modal.addEventListener("click", function (e) {
        if (e.target === this) {
          const bsModal = bootstrap.Modal.getInstance(this);
          if (bsModal) {
            bsModal.hide();
          }
        }
      });
    });
  }

  // Show SMS notification
  function showSMS(message, type = "info") {
    const sms = document.createElement("div");
    sms.className = `sms-message ${type}`;

    const now = new Date();
    const timeString = now.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    sms.innerHTML = `
          <button class="sms-close"><i class="bi bi-x"></i></button>
          <div class="sms-content">${message}</div>
          <div class="sms-time">${timeString}</div>
        `;

    smsContainer.appendChild(sms);

    // Add event listener to close button
    sms.querySelector(".sms-close").addEventListener("click", () => {
      sms.style.animation = "slideIn 0.3s ease-out reverse";
      setTimeout(() => {
        if (sms.parentNode === smsContainer) {
          smsContainer.removeChild(sms);
        }
      }, 300);
    });

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (sms.parentNode === smsContainer) {
        sms.style.animation = "slideIn 0.3s ease-out reverse";
        setTimeout(() => {
          smsContainer.removeChild(sms);
        }, 300);
      }
    }, 5000);
  }

  // Setup speech recognition
  function setupSpeechRecognition() {
    if ("SpeechRecognition" in window || "webkitSpeechRecognition" in window) {
      const SpeechRecognition =
        window.SpeechRecognition || window.webkitSpeechRecognition;
      recognition = new SpeechRecognition();
      recognition.continuous = false;
      recognition.lang = "en-US";
      recognition.interimResults = false;
      recognition.maxAlternatives = 1;

      recognition.onstart = function () {
        speechStartTime = Date.now();
      };

      recognition.onresult = function (event) {
        speechEndTime = Date.now();
        const speechResult = event.results[0][0].transcript;
        const timeTaken = (speechEndTime - speechStartTime) / 1000;
        const scoreResult = calculatePTEScore(currentText, speechResult, timeTaken);
        showResults(scoreResult, speechResult, timeTaken);
        savePracticeResult(scoreResult.totalScore, speechResult, timeTaken);
        showSMS(
          `Speech recognition completed. Score: ${scoreResult.totalScore}/90`,
          "success"
        );
      };

      recognition.onerror = function (event) {
        console.error("Speech recognition error:", event.error);
        showSMS(`Speech recognition error: ${event.error}`, "error");
        stopRecording();
      };

      recognition.onend = function () {
        stopRecording();
      };
    } else {
      console.warn("Speech recognition not supported in this browser");
      shadowingBtn.disabled = true;
      shadowBtn.disabled = true;
      showSMS("Speech recognition is not supported in your browser", "warning");
    }
  }

  // Start the timer
  function startTimer() {
    timeLeft = 40;
    timer.textContent = `Time: 00:${timeLeft.toString().padStart(2, "0")}`;

    if (timerInterval) clearInterval(timerInterval);

    timerInterval = setInterval(() => {
      timeLeft--;
      timer.textContent = `Time: 00:${timeLeft.toString().padStart(2, "0")}`;

      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        if (isRecording) {
          recognition.stop();
        }
        timer.textContent = "Time's up!";
        showSMS("Time has expired. Please try again.", "info");
      }
    }, 1000);
  }

  // Start recording
  function startRecording() {
    if (!microphonePermissionGranted) {
      showSMS("Please grant microphone permission first", "warning");
      return;
    }

    if (!recognition) {
      showSMS("Speech recognition is not available in your browser", "error");
      return;
    }

    if (isModalOpen) {
      showSMS("Please close the modal before starting recording", "warning");
      return;
    }

    try {
      recognition.start();
      isRecording = true;
      shadowingBtn.innerHTML =
        '<i class="bi bi-stop-circle me-2"></i>Stop Recording';
      shadowingBtn.classList.add("speaking");
      startTimer();
      showSMS("Recording started. Speak now...", "info");
    } catch (error) {
      console.error("Recognition start failed:", error);
      showSMS("Could not start microphone. Please check permissions.", "error");
    }
  }

  // Stop recording
  function stopRecording() {
    isRecording = false;
    shadowingBtn.innerHTML = '<i class="bi bi-mic-fill"></i> Shadowing';
    shadowingBtn.classList.remove("speaking");

    if (timerInterval) {
      clearInterval(timerInterval);
    }
  }

  // Calculate PTE-style score based on content, pronunciation, and fluency
  function calculatePTEScore(expected, actual, timeTaken) {
    // Content scoring (exact word matching) - 0-30 points
    const contentScore = calculateContentScore(expected, actual);
    
    // Pronunciation scoring (0-5 scale converted to 0-30 points)
    const pronunciationScore = calculatePronunciationScore(expected, actual) * 6;
    
    // Fluency scoring (0-5 scale converted to 0-30 points)
    const fluencyScore = calculateFluencyScore(expected, actual, timeTaken) * 6;
    
    // Apply your requirements:
    // 1. If pronunciation is good but speed is slow → score should not be high
    // 2. If speed is fast but pronunciation is bad → score should not be high
    // 3. High score only when all three are good
    
    // Calculate weighted score that requires balance between all components
    const balancedScore = calculateBalancedScore(contentScore, pronunciationScore, fluencyScore);
    
    return {
      totalScore: Math.min(90, balancedScore),
      contentScore: Math.round(contentScore),
      pronunciationScore: Math.round(pronunciationScore),
      fluencyScore: Math.round(fluencyScore)
    };
  }

  // Calculate a balanced score that requires good performance in all areas
  function calculateBalancedScore(content, pronunciation, fluency) {
    // Convert to 0-1 scale for easier calculations
    const contentNorm = content / 30;
    const pronunciationNorm = pronunciation / 30;
    const fluencyNorm = fluency / 30;
    
    // Geometric mean emphasizes balanced performance
    // This will penalize significantly low scores in any area
    const geometricMean = Math.pow(
      contentNorm * pronunciationNorm * fluencyNorm, 
      1/3
    );
    
    // Also consider harmonic mean which is even stricter about low values
    const harmonicMean = 3 / (1/contentNorm + 1/pronunciationNorm + 1/fluencyNorm);
    
    // Use a weighted combination of both means
    const balancedScore = (geometricMean * 0.7 + harmonicMean * 0.3) * 90;
    
    return Math.round(balancedScore);
  }

  // Calculate content score based on exact word matching
  function calculateContentScore(expected, actual) {
    const expectedWords = expected.toLowerCase().split(/\s+/);
    const actualWords = actual.toLowerCase().split(/\s+/);
    
    let correctWords = 0;
    let totalWords = expectedWords.length;
    
    // Count correct words (case-insensitive)
    for (let i = 0; i < Math.min(expectedWords.length, actualWords.length); i++) {
      if (actualWords[i] === expectedWords[i]) {
        correctWords++;
      }
    }
    
    // Calculate content accuracy (max 30 points)
    const contentAccuracy = (correctWords / totalWords) * 30;
    return Math.min(30, Math.round(contentAccuracy));
  }

  // Calculate pronunciation score (0-5 scale)
  function calculatePronunciationScore(expected, actual) {
    const expectedWords = expected.toLowerCase().split(/\s+/);
    const actualWords = actual.toLowerCase().split(/\s+/);
    
    let matchedWords = 0;
    
    // Check each word
    for (let i = 0; i < Math.min(expectedWords.length, actualWords.length); i++) {
      const expectedWord = expectedWords[i].replace(/[^\w]/g, "");
      const actualWord = actualWords[i].replace(/[^\w]/g, "");
      
      // Simple matching - in a real app, you might use a pronunciation dictionary
      if (actualWord === expectedWord) {
        matchedWords++;
      }
    }
    
    // Calculate pronunciation accuracy
    const accuracy = matchedWords / expectedWords.length;
    
    // Map to PTE's 0-5 scale
    if (accuracy >= 0.95) return 5; // Highly proficient
    if (accuracy >= 0.85) return 4; // Advanced
    if (accuracy >= 0.70) return 3; // Good
    if (accuracy >= 0.50) return 2; // Intermediate
    if (accuracy >= 0.25) return 1; // Intrusive
    return 0; // Non-English
  }

  // Calculate fluency score (0-5 scale)
  function calculateFluencyScore(expected, actual, timeTaken) {
    const wordCount = expected.split(/\s+/).length;
    
    // Calculate words per minute (WPM)
    const minutes = timeTaken / 60;
    const wpm = wordCount / minutes;
    
    // Ideal WPM range for PTE is 140-160
    let speedScore = 0;
    if (wpm >= 140 && wpm <= 160) {
      speedScore = 5; // Perfect
    } else if (wpm >= 130 && wpm < 140) {
      speedScore = 4; // Good but slightly slow
    } else if (wpm > 160 && wpm <= 170) {
      speedScore = 4; // Good but slightly fast
    } else if (wpm >= 120 && wpm < 130) {
      speedScore = 3; // Noticeably slow
    } else if (wpm > 170 && wpm <= 180) {
      speedScore = 3; // Noticeably fast
    } else if (wpm >= 100 && wpm < 120) {
      speedScore = 2; // Too slow
    } else if (wpm > 180 && wpm <= 200) {
      speedScore = 2; // Too fast
    } else {
      speedScore = 1; // Extremely slow or fast
    }
    
    // Calculate pause frequency (approximated by comparing actual vs expected word count)
    const actualWordCount = actual.split(/\s+/).length;
    const pausePenalty = Math.abs(actualWordCount - wordCount) / wordCount;
    
    // Adjust speed score based on pause frequency
    let fluencyScore = speedScore * (1 - pausePenalty);
    
    // Ensure score is between 0-5
    return Math.min(5, Math.max(0, fluencyScore));
  }

  // Show results after recording
  function showResults(scoreResult, userSpeech, timeTaken) {
    // Calculate words per minute
    const wordCount = currentText.split(/\s+/).length;
    const wpm = Math.round(wordCount / (timeTaken / 60));

    // Create results display
    const resultsHTML = `
          <div class="score-display">
            <div>Your Score</div>
            <div>${scoreResult.totalScore}/90</div>
          </div>
          <div class="breakdown-area">
            <div class="breakdown-item">
              <span class="breakdown-label">Content:</span>
              <span class="breakdown-value">${scoreResult.contentScore}/30</span>
            </div>
            <div class="breakdown-item">
              <span class="breakdown-label">Pronunciation:</span>
              <span class="breakdown-value">${scoreResult.pronunciationScore}/30</span>
            </div>
            <div class="breakdown-item">
              <span class="breakdown-label">Fluency:</span>
              <span class="breakdown-value">${scoreResult.fluencyScore}/30</span>
            </div>
          </div>
          <div class="feedback-area">
            <div class="feedback-content">
              ${generateFeedback(scoreResult.totalScore, userSpeech, timeTaken)}
            </div>
            <div class="speed-score">
              Speaking speed: ${wpm} words per minute
            </div>
            ${getSpeedFeedback(wpm)}
          </div>
        `;

    textDisplay.innerHTML = resultsHTML;
    submitBtn.disabled = false;
  }

  // Generate feedback based on the score
  function generateFeedback(score, userSpeech, timeTaken) {
    let feedback = "";

    if (score >= 80) {
      feedback =
        '<p class="correct">Excellent! Your pronunciation, fluency, and content accuracy are at a high level.</p>';
    } else if (score >= 60) {
      feedback =
        '<p class="correct">Good job! Your speech is mostly accurate with good fluency.</p>';
    } else if (score >= 40) {
      feedback = "<p>Not bad! With more practice, you'll improve pronunciation and fluency.</p>";
    } else {
      feedback =
        '<p class="incorrect">Keep practicing! Focus on reading exactly what's on screen and maintaining a natural pace.</p>';
    }

    feedback += `<p>You said: <strong>"${userSpeech}"</strong></p>`;
    feedback += `<p>Expected: <strong>"${currentText}"</strong></p>`;
    feedback += `<p>Time taken: <strong>${timeTaken.toFixed(1)} seconds</strong></p>`;

    return feedback;
  }

  // Get feedback about speaking speed
  function getSpeedFeedback(wpm) {
    if (wpm >= 140 && wpm <= 160) {
      return '<p class="correct speed-feedback">Your speaking speed is perfect for PTE!</p>';
    } else if (wpm >= 120 && wpm < 140) {
      return '<p class="speed-feedback">Your speaking speed is good, but try to speak a bit faster.</p>';
    } else if (wpm > 160 && wpm <= 180) {
      return '<p class="speed-feedback">Your speaking speed is good, but try to slow down slightly for better clarity.</p>';
    } else if (wpm >= 100 && wpm < 120) {
      return '<p class="incorrect speed-feedback">Your speech is too slow for PTE. Try to speak faster.</p>';
    } else if (wpm > 180 && wpm <= 200) {
      return '<p class="incorrect speed-feedback">Your speech is too fast. Try to slow down for better clarity.</p>';
    } else {
      return '<p class="incorrect speed-feedback">Your speaking speed needs significant improvement for PTE.</p>';
    }
  }

  // Event handlers
  function handleMicrophoneHelp() {
    showSMS(
      "To use speech recognition, please allow microphone access in your browser settings.",
      "info"
    );
  }

  function handleSubmit() {
    showSMS("Submission complete! Your practice has been saved.", "success");
  }

  function handleRedo() {
    textDisplay.textContent = currentText;
    submitBtn.disabled = true;
    startTimer();
    showSMS("Practice restarted. Good luck!", "info");
  }

  function handleTranslation() {
    showSMS("Translation feature would be implemented here.", "info");
  }

  function handleZenPractice() {
    showSMS(
      "Zen Practice mode activated. Focus on your pronunciation without distractions.",
      "info"
    );
  }

  function handleShadowing() {
    if (isRecording) {
      recognition.stop();
    } else {
      if (!currentText) {
        showSMS(
          "Please select a text first using the panel on the right.",
          "warning"
        );
        return;
      }
      startRecording();
    }
  }

  function handleOneLineMode() {
    showSMS(
      "One Line Mode activated. Text will be displayed one line at a time.",
      "info"
    );
  }

  function handlePrevious() {
    showSMS("Loading previous practice text...", "info");
  }

  function handleNext() {
    showSMS("Loading next practice text...", "info");
  }

  function handleSearch() {
    const searchTerm = questionSearch.value;
    if (searchTerm) {
      showSMS(`Searching for: ${searchTerm}`, "info");
    }
  }

  function handleTestSearch() {
    const searchTerm = testSearch.value.toLowerCase();
    
    if (searchTerm.trim() === '') {
      filteredTestItems = [...allTestItems];
    } else {
      filteredTestItems = allTestItems.filter(item => 
        item.title.toLowerCase().includes(searchTerm) || 
        item.text.toLowerCase().includes(searchTerm) ||
        item.category.toLowerCase().includes(searchTerm)
      );
    }
    
    currentPage = 1;
    renderTestItems();
    updatePagination();
  }

  function handleApplyTest() {
    if (selectedTestItem) {
      currentText = selectedTestItem.dataset.text;
      currentQuestionId = selectedTestItem.dataset.id;
      textDisplay.textContent = currentText;
      submitBtn.disabled = true;

      // Close the modal properly
      const modalElement = document.getElementById("testSelectorModal");
      const modal = bootstrap.Modal.getInstance(modalElement);
      modal.hide();

      // Record start time
      practiceStartTime = Date.now();

      // Show success notification
      showSMS(
        "The selected text has been loaded successfully. You can now start practicing.",
        "success"
      );

      // Start the timer
      startTimer();
    } else {
      showSMS("Please select a test text first.", "warning");
    }
  }

  function handleConfirmExam() {
    if (examInfoForm.checkValidity()) {
      showSMS("Exam information confirmed successfully!", "success");
      const modal = bootstrap.Modal.getInstance(
        document.getElementById("examInfoModal")
      );
      modal.hide();

      // Update tested count (in a real app, this would come from a server)
      loadTestedCount();
    } else {
      showSMS("Please fill in all required fields.", "warning");
    }
  }

  function handleAskStage() {
    showSMS("Asking the teacher for your current stage goal...", "info");
  }

  function handleCloseTip() {
    const tipCard = document.querySelector(".sd-card");
    tipCard.style.display = "none";
    showSMS("Tip closed. You can reopen tips from the help menu.", "info");
  }

  function handleStudyGuide() {
    showSMS("Opening study guide...", "info");
  }

  function handleShadow() {
    if (!currentText) {
      showSMS(
        "Please select a text first using the panel on the right.",
        "warning"
      );
      return;
    }

    // Speak the text for shadowing practice
    if (synthesis.speaking) {
      synthesis.cancel();
    }

    const utterance = new SpeechSynthesisUtterance(currentText);
    utterance.lang = "en-US";
    utterance.rate = 0.9;

    synthesis.speak(utterance);
    shadowBtn.innerHTML = '<i class="bi bi-pause-circle me-2"></i>Pause';
    shadowBtn.classList.add("speaking");
    showSMS("Playing text for shadow practice...", "info");

    utterance.onend = function () {
      shadowBtn.innerHTML = "Shadow";
      shadowBtn.classList.remove("speaking");
      startRecording(); // Start recording after the text is spoken
      showSMS("Finished playing. Start speaking now...", "info");
    };
  }

  function handleSpeakText() {
    const customText = customTextInput.value.trim();
    if (!customText) {
      showSMS("Please enter some text to speak.", "warning");
      return;
    }

    // Speak the custom text
    if (synthesis.speaking) {
      synthesis.cancel();
    }

    const utterance = new SpeechSynthesisUtterance(customText);
    utterance.lang = "en-US";
    utterance.rate = 0.9;

    synthesis.speak(utterance);
    showSMS("Speaking your custom text...", "info");

    utterance.onend = function () {
      showSMS("Finished speaking your text.", "success");
    };
  }

  function handleCustomTextInput() {
    const customText = customTextInput.value.trim();
    if (customText) {
      currentText = customText;
      textDisplay.textContent = currentText;
      submitBtn.disabled = true;
      currentQuestionId = null; // Custom text has no question ID
      practiceStartTime = Date.now();
    }
  }

  // Initialize the application
  init();
});