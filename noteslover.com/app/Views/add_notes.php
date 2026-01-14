<?= view('includes/header') ?>
      <div class="main-panel">
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Forms</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Form</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Elements</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="email2">Email Address</label>
                          <input
                            type="email"
                            class="form-control"
                            id="email2"
                            placeholder="Enter Email"
                          />
                          <small id="emailHelp2" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                          >
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                          />
                        </div>
                        <div class="form-group has-error has-feedback">
                          <label for="errorInput">Error Input</label>
                          <input
                            type="text"
                            id="errorInput"
                            value="Error"
                            class="form-control"
                          />
                          <small id="emailHelp" class="form-text text-muted"
                            >Please provide a valid informations.</small
                          >
                        </div>
                        <div class="form-group">
                          <label>Gender</label><br />
                          <div class="d-flex">
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault1"
                              />
                              <label
                                class="form-check-label"
                                for="flexRadioDefault1"
                              >
                                Male
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="flexRadioDefault"
                                id="flexRadioDefault2"
                                checked
                              />
                              <label
                                class="form-check-label"
                                for="flexRadioDefault2"
                              >
                                Female
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"
                              >@</span
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Username"
                              aria-label="Username"
                              aria-describedby="basic-addon1"
                            />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Recipient's username"
                              aria-label="Recipient's username"
                              aria-describedby="basic-addon2"
                            />
                            <span class="input-group-text" id="basic-addon2"
                              >@example.com</span
                            >
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="basic-url">Your vanity URL</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"
                              >https://example.com/users/</span
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="basic-url"
                              aria-describedby="basic-addon3"
                            />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input
                              type="text"
                              class="form-control"
                              aria-label="Amount (to the nearest dollar)"
                            />
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-text">With textarea</span>
                            <textarea
                              class="form-control"
                              aria-label="With textarea"
                            ></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <button
                              class="btn btn-black btn-border"
                              type="button"
                            >
                              Button
                            </button>
                            <input
                              type="text"
                              class="form-control"
                              placeholder=""
                              aria-label=""
                              aria-describedby="basic-addon1"
                            />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <input
                              type="text"
                              class="form-control"
                              aria-label="Text input with dropdown button"
                            />
                            <div class="input-group-append">
                              <button
                                class="btn btn-primary btn-border dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                Dropdown
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#"
                                  >Another action</a
                                >
                                <a class="dropdown-item" href="#"
                                  >Something else here</a
                                >
                                <div
                                  role="separator"
                                  class="dropdown-divider"
                                ></div>
                                <a class="dropdown-item" href="#"
                                  >Separated link</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-user"></i>
                            </span>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Username"
                            />
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?= view('includes/footer') ?>