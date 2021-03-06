
    <div class="container-fluid">
        <div class="row">
            <div class="pn-ProductNav_Wrapper">
                <nav id="pnProductNav" class="pn-ProductNav">
                    <div id="pnProductNavContents" class="pn-ProductNav_Contents">
                        <a href="{{url($client->user->name.'/'.'info')}}" class="pn-ProductNav_Link" aria-selected="true">Info</a>
                        <a href="{{url($client->user->name.'/'.'course-fee')}}" class="pn-ProductNav_Link">Course & Fees</a>
                        <a href="{{url($client->user->name.'/'.'results')}}" class="pn-ProductNav_Link">Result</a>
                        <a href="{{url($client->user->name.'/'.'review')}}" class="pn-ProductNav_Link">Review</a>
                        <a href="{{url($client->user->name.'/'.'gallery')}}" class="pn-ProductNav_Link">Gallery</a>
                        <a href="{{url($client->user->name.'/'.'faculty')}}" class="pn-ProductNav_Link">Faculty</a>
                        <a href="{{url($client->user->name.'/'.'facility')}}" class="pn-ProductNav_Link">Facility</a>
                        <a href="{{url($client->user->name.'/'.'news-article')}}" class="pn-ProductNav_Link">News & Article</a>
                    </div>
                    <span class="pn-ProductNav_Indicator"></span>
                </nav>
                <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
                    <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                </button>
                <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
                    <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="collage_profile_details">
        <a class=" twPc-block" style="background-image: url('{{url('public/frontend/images/uploads/college/banner')}}/{{$client->banner}}'); height: 200px"></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="cllage_pfofile_image">
                        <div class="twPc-button">
                            <div class="top_feature_collage_view">
                                <p>
                                    <i class="fa fa-eye"></i>3232
                                </p>
                            </div>
                        </div>
                        <a title="Mert S. Kaplan" href="#" class="twPc-avatarLink">
                            <img alt="Mert S. Kaplan" src="{{url('public/frontend/images/uploads/college/logo')}}/{{$client->logo}}" class="twPc-avatarImg">
                        </a>
                        <div class="twPc-divUser">
                            <div class="twPc-divName">
                                <h1 class="collage_p_t"><a href="{{url('collage-profile')}}">{{$client->company_name}}</a></h1>
                            </div>
                            <span>
                <a href="#">
                  <i class="fa fa-map-marker"></i>
                     <span>{{$client->address}}, {{$client->district->name}}</span>
                </a>
              </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


        // Out advancer buttons
        var pnAdvancerLeft = document.getElementById("pnAdvancerLeft");
        var pnAdvancerRight = document.getElementById("pnAdvancerRight");

        var pnProductNav = document.getElementById("pnProductNav");
        var pnProductNavContents = document.getElementById("pnProductNavContents");

        pnProductNav.setAttribute(
            "data-overflowing",
            determineOverflow(pnProductNavContents, pnProductNav)
        );

        // Handle the scroll of the horizontal container
        var last_known_scroll_position = 0;
        var ticking = false;

        function doSomething(scroll_pos) {
            pnProductNav.setAttribute(
                "data-overflowing",
                determineOverflow(pnProductNavContents, pnProductNav)
            );
        }

        pnProductNav.addEventListener("scroll", function() {
            last_known_scroll_position = window.scrollY;
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    doSomething(last_known_scroll_position);
                    ticking = false;
                });
            }
            ticking = true;
        });

        pnAdvancerLeft.addEventListener("click", function() {
            // If in the middle of a move return
            if (SETTINGS.navBarTravelling === true) {
                return;
            }
            // If we have content overflowing both sides or on the left
            if (
                determineOverflow(pnProductNavContents, pnProductNav) === "left" ||
                determineOverflow(pnProductNavContents, pnProductNav) === "both"
            ) {
                // Find how far this panel has been scrolled
                var availableScrollLeft = pnProductNav.scrollLeft;
                // If the space available is less than two lots of our desired distance, just move the whole amount
                // otherwise, move by the amount in the settings
                if (availableScrollLeft < SETTINGS.navBarTravelDistance * 2) {
                    pnProductNavContents.style.transform =
                        "translateX(" + availableScrollLeft + "px)";
                } else {
                    pnProductNavContents.style.transform =
                        "translateX(" + SETTINGS.navBarTravelDistance + "px)";
                }
                // We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
                pnProductNavContents.classList.remove("pn-ProductNav_Contents-no-transition");
                // Update our settings
                SETTINGS.navBarTravelDirection = "left";
                SETTINGS.navBarTravelling = true;
            }
            // Now update the attribute in the DOM
            pnProductNav.setAttribute(
                "data-overflowing",
                determineOverflow(pnProductNavContents, pnProductNav)
            );
        });

        pnAdvancerRight.addEventListener("click", function() {
            // If in the middle of a move return
            if (SETTINGS.navBarTravelling === true) {
                return;
            }
            // If we have content overflowing both sides or on the right
            if (
                determineOverflow(pnProductNavContents, pnProductNav) === "right" ||
                determineOverflow(pnProductNavContents, pnProductNav) === "both"
            ) {
                // Get the right edge of the container and content
                var navBarRightEdge = pnProductNavContents.getBoundingClientRect().right;
                var navBarScrollerRightEdge = pnProductNav.getBoundingClientRect().right;
                // Now we know how much space we have available to scroll
                var availableScrollRight = Math.floor(
                    navBarRightEdge - navBarScrollerRightEdge
                );
                // If the space available is less than two lots of our desired distance, just move the whole amount
                // otherwise, move by the amount in the settings
                if (availableScrollRight < SETTINGS.navBarTravelDistance * 2) {
                    pnProductNavContents.style.transform =
                        "translateX(-" + availableScrollRight + "px)";
                } else {
                    pnProductNavContents.style.transform =
                        "translateX(-" + SETTINGS.navBarTravelDistance + "px)";
                }
                // We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
                pnProductNavContents.classList.remove("pn-ProductNav_Contents-no-transition");
                // Update our settings
                SETTINGS.navBarTravelDirection = "right";
                SETTINGS.navBarTravelling = true;
            }
            // Now update the attribute in the DOM
            pnProductNav.setAttribute(
                "data-overflowing",
                determineOverflow(pnProductNavContents, pnProductNav)
            );
        });

        pnProductNavContents.addEventListener(
            "transitionend",
            function() {
                // get the value of the transform, apply that to the current scroll position (so get the scroll pos first) and then remove the transform
                var styleOfTransform = window.getComputedStyle(pnProductNavContents, null);
                var tr =
                    styleOfTransform.getPropertyValue("-webkit-transform") ||
                    styleOfTransform.getPropertyValue("transform");
                // If there is no transition we want to default to 0 and not null
                var amount = Math.abs(parseInt(tr.split(",")[4]) || 0);
                pnProductNavContents.style.transform = "none";
                pnProductNavContents.classList.add("pn-ProductNav_Contents-no-transition");
                // Now lets set the scroll position
                if (SETTINGS.navBarTravelDirection === "left") {
                    pnProductNav.scrollLeft = pnProductNav.scrollLeft - amount;
                } else {
                    pnProductNav.scrollLeft = pnProductNav.scrollLeft + amount;
                }
                SETTINGS.navBarTravelling = false;
            },
            false
        );

        // Handle setting the currently active link
        pnProductNavContents.addEventListener("click", function(e) {
            var links = [].slice.call(document.querySelectorAll(".pn-ProductNav_Link"));
            links.forEach(function(item) {
                item.setAttribute("aria-selected", "false");
            });
            e.target.setAttribute("aria-selected", "true");
        });

        function determineOverflow(content, container) {
            var containerMetrics = container.getBoundingClientRect();
            var containerMetricsRight = Math.floor(containerMetrics.right);
            var containerMetricsLeft = Math.floor(containerMetrics.left);
            var contentMetrics = content.getBoundingClientRect();
            var contentMetricsRight = Math.floor(contentMetrics.right);
            var contentMetricsLeft = Math.floor(contentMetrics.left);
            if (
                containerMetricsLeft > contentMetricsLeft &&
                containerMetricsRight < contentMetricsRight
            ) {
                return "both";
            } else if (contentMetricsLeft < containerMetricsLeft) {
                return "left";
            } else if (contentMetricsRight > containerMetricsRight) {
                return "right";
            } else {
                return "none";
            }
        }

    </script>