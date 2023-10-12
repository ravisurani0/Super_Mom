  <!-- Modal -->
  <div class="modal fade" id="reviewModal" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Write your review</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" role="form" id="reviewModalForm">
                      <div class="form-group">

                          <input type="hidden" name="product_id" id="prod_id" value="{{ $product['id'] }}">
                          <label class="control-label col-md-3" for="title">Title</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" require />
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3" for="description">Customer</label>
                          <div class="col-md-9">
                              <select name="customer" id="customer" class="form-control" placeholder="Select Customer" require>
                                  <option value=""> Select customer</option>
                                  @isset($customers)
                                  @foreach ($customers as $customer)
                                  <option value="{{ $customer->id }}"> {{ $customer->name }}</option>
                                  @endforeach
                                  @endisset
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3" for="description">Description</label>
                          <div class="col-md-9">
                              <textarea name="description" id="" class="form-control" cols="30" rows="10" placeholder="Detail Review" require></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3" for="rating">Rate</label>
                          <div class="">
                              <div class="star-rating">
                                  <input type="radio" id="5-stars" name="rating" value="5" class="ratting" require>
                                  <label for="5-stars" class="star">★</label>
                                  <input type="radio" id="4-stars" name="rating" value="4" class="ratting" require>
                                  <label for="4-stars" class="star ">★</label>
                                  <input type="radio" id="3-stars" name="rating" value="3" class="ratting" require>
                                  <label for="3-stars" class="star">★</label>
                                  <input type="radio" id="2-stars" name="rating" value="2" class="ratting" require>
                                  <label for="2-stars" class="star">★</i></label>
                                  <input type="radio" id="1-star" name="rating" value="1" class="ratting" require>
                                  <label for="1-star" class="star">★</label>
                              </div>
                              <span class="text-danger" id="ratting_error"></span>
                          </div>
                      </div>
                      <div class="text-center ">
                          <button type="submit" class="btn btn-success mr-5" id="btnSaveIt">Save</button>
                          <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>