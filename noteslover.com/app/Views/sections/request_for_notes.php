
<!-- Marquee Section -->
<div style="border: 1px solid #d5d5d5;padding:10px;" class="bg-light">
  <marquee behavior="alternate" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
    Can't find your notes? 
    We will try to provide them for free!
    <button id="requestNotesBtn" class="btn btn-success rounded">Request Notes</button> 
  </marquee>
</div>

<!-- Request Notes Popup -->
<div id="requestNotesPopup" class="popup-overlay">
  <div class="popup-content">
    <span class="popup-close">&times;</span>
    <h2>Can't find your notes?</h2>
    <p>If you do not find your related notes, please let us know and we will try to provide them for free!</p>
    <form id="requestNotesForm">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="notes_request" placeholder="Which notes are you looking for?" required></textarea>
      <button type="submit">Submit Request</button>
    </form>
    <p id="requestSuccess" style="display:none; color:green; margin-top:10px;">Thank you! We'll get back to you soon.</p>
  </div>
</div>

<style>
/* Popup Overlay */
.popup-overlay {
  display: none; /* hidden by default */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  z-index: 9999;
  justify-content: center;
  align-items: center;
}

/* Popup Box */
.popup-content {
  background: #fff;
  padding: 25px 30px;
  max-width: 400px;
  width: 90%;
  border-radius: 8px;
  position: relative;
  text-align: center;
  font-family: Arial, sans-serif;
}

/* Close Button */
.popup-close {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 22px;
  font-weight: bold;
  cursor: pointer;
}

/* Form Fields */
#requestNotesForm input, 
#requestNotesForm textarea {
  width: 100%;
  padding: 8px 10px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 14px;
}

#requestNotesForm button {
  background-color: #007bff;
  color: white;
  padding: 10px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
  width: 100%;
}

#requestNotesForm button:hover {
  background-color: #0056b3;
}
</style>