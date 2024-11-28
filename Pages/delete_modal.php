<div id="deleteModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
          <form  action="index.php?function=EmployeeDetails&action=viewdet"  method="POST">
             <div class="modal-header">                        
                <h4 class="modal-title"  id="deleteModalLabel">Delete Department</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                         <div class="modal-body">
                         <div class="form-group">                    
                           <p>Are you sure you want to delete these Records?</p>
                           <input type="hidden" name="delete_id" id="delete_id">
                            <input type="hidden" name="department" id="department">
                            <p class="text-warning"><small>.</small></p>

                      <select name="editstatus" id="editstatus"  class="form-control">
                          <option value="NA">--Select--</option>      
                          <option value="1">Active</option>      
                          <option value="2">De-active</option>      
                          </select>
                         </div>
                         </div>
                         <div class="modal-footer">
                           <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                           <input type="submit" class="btn btn-danger" name="delete" id="delete" value="Delete">
                        </div>
                     </form>
                  </div>
               </div>
            </div>