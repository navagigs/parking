
@if (\Session::has('success'))  
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
 <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -148px;"><div class="sa-icon sa-error" style="display: none;">
  <span class="sa-x-mark">
    <span class="sa-line sa-left"></span>
    <span class="sa-line sa-right"></span>
  </span>
</div><div class="sa-icon sa-warning" style="display: none;">
  <span class="sa-body"></span>
  <span class="sa-dot"></span>
</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success animate" style="display: block;">
  <span class="sa-line sa-tip animateSuccessTip"></span>
  <span class="sa-line sa-long animateSuccessLong"></span>

  <div class="sa-placeholder"></div>
  <div class="sa-fix"></div>
</div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Berhasil!</h2>
<p style="display: block;">{!! \Session('success') !!}</p>
<fieldset>
  <input type="text" tabindex="3" placeholder="">
  <div class="sa-input-error"></div>
</fieldset><div class="sa-error-container">
  <div class="icon">!</div>
  <p>Not valid!</p>
</div><div class="sa-button-container">
  <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
  <div class="sa-button-container">

    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
</div></div>
</div>
@elseif (\Session::has('warning'))
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
 <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -148px;"><div class="sa-icon sa-error" style="display: none;">
  <span class="sa-x-mark">
    <span class="sa-line sa-left"></span>
    <span class="sa-line sa-right"></span>
  </span>
</div><div class="sa-icon sa-warning pulseWarning" style="display: block;">
  <span class="sa-body pulseWarningIns"></span>
  <span class="sa-dot pulseWarningIns"></span>
</div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
  <span class="sa-line sa-tip"></span>
  <span class="sa-line sa-long"></span>


  <div class="sa-placeholder"></div>
  <div class="sa-fix"></div>
</div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Peringatan!</h2>
<p style="display: block;">{!! \Session('warning') !!}</p>
<fieldset>
  <input type="text" tabindex="3" placeholder="">
  <div class="sa-input-error"></div>
</fieldset><div class="sa-error-container">
  <div class="icon">!</div>
  <p>Not valid!</p>
</div><div class="sa-button-container">
  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  
  <div></div>
  <div></div>
  <div></div>
</div>
</div>
</div></div>
</div>
@elseif (\Session::has('error'))
<div id="confirmationModal" class="modal fade" role="dialog">
  <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -148px;"><div class="sa-icon sa-error animateErrorIcon" style="display: block;">
    <span class="sa-x-mark animateXMark">
      <span class="sa-line sa-left"></span>
      <span class="sa-line sa-right"></span>
    </span>
  </div><div class="sa-icon sa-warning pulseWarning" style="display: none;">
    <span class="sa-body pulseWarningIns"></span>
    <span class="sa-dot pulseWarningIns"></span>
  </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
    <span class="sa-line sa-tip"></span>
    <span class="sa-line sa-long"></span>

    <div class="sa-placeholder"></div>
    <div class="sa-fix"></div>
  </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Gagal!</h2>
  <p style="display: block;">{!! \Session('error') !!} </p>
  <fieldset>
    <input type="text" tabindex="3" placeholder="">
    <div class="sa-input-error"></div>
  </fieldset><div class="sa-error-container">
    <div class="icon">!</div>
    <p>Not valid!</p>
  </div><div class="sa-button-container">
    <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
    <div class="sa-button-container">
      
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button><div class="la-ball-fall">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div></div>
</div>
@endif
