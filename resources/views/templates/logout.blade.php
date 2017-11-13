<div class="modal fade" id="logout-modal" role="dialog">
    <div class="modal-dialog modal-sm vertical-center">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Destroy session</h4>
            </div>
            <div class="modal-body">
                <p>This will clear your current session. You will need to join communities again.</p>
                <p>You can save session and store session code somewhere safe to later return to all communities.</p>
                <form id="session-save">
                    {{ csrf_field() }}
                    <div class="input-group" style="margin-bottom: 5px;">
                        <select class="form-control" name="expire">
                            <option value="86400">1 day</option>
                            <option value="259200">3 days</option>
                            <option value="604800">7 days</option>
                            <option selected value="2592000">30 days</option>
                            <option value="5184000">60 days</option>
                            <option value="7776000">90 days</option>
                            <option value="31536000">365 days</option>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-floppy-save"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div id="session-id" class="well well-sm text-center text-muted">
                </div>

            </div>
            <div class="modal-footer">
                <form action="{{ url('/logout') }}">
                    <input type="submit" class="btn btn-danger" value="Destroy"/>
                </form>
            </div>
        </div>
    </div>
</div>