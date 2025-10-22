/**
 * Animation functionality for the Next theme.
 *
 * @module theme_next/animations
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery'], function($) {
    
    var Animations = {
        
        /**
         * Initialize all animations.
         */
        init: function() {
            this.initPageLoadAnimations();
            this.initScrollAnimations();
            this.initHoverAnimations();
            this.initLoadingAnimations();
        },
        
        /**
         * Initialize page load animations.
         */
        initPageLoadAnimations: function() {
            // Stagger animation for dashboard cards
            $('.dashboard-card').each(function(index) {
                $(this).css({
                    'opacity': '0',
                    'transform': 'translateY(20px)'
                });
                
                setTimeout(function() {
                    $(this).css({
                        'opacity': '1',
                        'transform': 'translateY(0)',
                        'transition': 'all 0.6s ease-out'
                    });
                }.bind(this), index * 100);
            });
            
            // Animate metric values
            $('.metric-value').each(function(index) {
                $(this).css({
                    'opacity': '0',
                    'transform': 'scale(0.8)'
                });
                
                setTimeout(function() {
                    $(this).css({
                        'opacity': '1',
                        'transform': 'scale(1)',
                        'transition': 'all 0.5s ease-out'
                    });
                }.bind(this), index * 150 + 300);
            });
        },
        
        /**
         * Initialize scroll-triggered animations.
         */
        initScrollAnimations: function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe elements for scroll animations
            $('.dashboard-card, .module-item, .assignment-item').each(function() {
                observer.observe(this);
            });
        },
        
        /**
         * Initialize hover animations.
         */
        initHoverAnimations: function() {
            // Card hover effects
            $('.dashboard-card').on('mouseenter', function() {
                $(this).css({
                    'transform': 'translateY(-4px)',
                    'transition': 'all 0.3s ease-out'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'translateY(0)',
                    'transition': 'all 0.3s ease-out'
                });
            });
            
            // Button hover effects
            $('.btn').on('mouseenter', function() {
                $(this).css({
                    'transform': 'translateY(-1px)',
                    'transition': 'all 0.2s ease-out'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'translateY(0)',
                    'transition': 'all 0.2s ease-out'
                });
            });
            
            // Module item hover effects
            $('.module-item').on('mouseenter', function() {
                $(this).css({
                    'transform': 'translateX(8px)',
                    'transition': 'all 0.3s ease-out'
                });
            }).on('mouseleave', function() {
                $(this).css({
                    'transform': 'translateX(0)',
                    'transition': 'all 0.3s ease-out'
                });
            });
        },
        
        /**
         * Initialize loading animations.
         */
        initLoadingAnimations: function() {
            // Skeleton loading for cards
            this.createSkeletonLoader();
            
            // Progress bar animations
            this.animateProgressBars();
            
            // Chart loading animations
            this.animateCharts();
        },
        
        /**
         * Create skeleton loading effect.
         */
        createSkeletonLoader: function() {
            $('.dashboard-card').each(function() {
                var $card = $(this);
                var $skeleton = $('<div class="skeleton-loader"></div>');
                
                $card.prepend($skeleton);
                
                setTimeout(function() {
                    $skeleton.fadeOut(300, function() {
                        $(this).remove();
                    });
                }, 1000);
            });
        },
        
        /**
         * Animate progress bars.
         */
        animateProgressBars: function() {
            $('.progress-fill').each(function() {
                var $this = $(this);
                var width = $this.data('width') || $this.attr('style').match(/width:\s*(\d+%)/);
                
                if (width) {
                    $this.css('width', '0%');
                    
                    setTimeout(function() {
                        $this.css({
                            'width': width,
                            'transition': 'width 1.5s ease-out'
                        });
                    }, 500);
                }
            });
        },
        
        /**
         * Animate charts.
         */
        animateCharts: function() {
            $('.chart-content').each(function() {
                var $chart = $(this);
                $chart.css({
                    'opacity': '0',
                    'transform': 'scale(0.9)'
                });
                
                setTimeout(function() {
                    $chart.css({
                        'opacity': '1',
                        'transform': 'scale(1)',
                        'transition': 'all 0.8s ease-out'
                    });
                }, 800);
            });
        },
        
        /**
         * Animate counter values.
         */
        animateCounters: function() {
            $('.metric-value').each(function() {
                var $this = $(this);
                var target = parseInt($this.text());
                var duration = 2000;
                var start = 0;
                var increment = target / (duration / 16);
                
                var timer = setInterval(function() {
                    start += increment;
                    if (start >= target) {
                        $this.text(target);
                        clearInterval(timer);
                    } else {
                        $this.text(Math.floor(start));
                    }
                }, 16);
            });
        },
        
        /**
         * Animate tab transitions.
         */
        animateTabTransition: function($oldTab, $newTab) {
            $oldTab.css({
                'opacity': '0',
                'transform': 'translateX(-20px)',
                'transition': 'all 0.3s ease-out'
            });
            
            setTimeout(function() {
                $oldTab.hide();
                $newTab.show().css({
                    'opacity': '0',
                    'transform': 'translateX(20px)'
                });
                
                setTimeout(function() {
                    $newTab.css({
                        'opacity': '1',
                        'transform': 'translateX(0)',
                        'transition': 'all 0.3s ease-out'
                    });
                }, 50);
            }, 300);
        },
        
        /**
         * Animate modal appearance.
         */
        animateModal: function($modal) {
            $modal.css({
                'opacity': '0',
                'transform': 'scale(0.9)'
            });
            
            setTimeout(function() {
                $modal.css({
                    'opacity': '1',
                    'transform': 'scale(1)',
                    'transition': 'all 0.3s ease-out'
                });
            }, 50);
        },
        
        /**
         * Animate notification appearance.
         */
        animateNotification: function($notification) {
            $notification.css({
                'opacity': '0',
                'transform': 'translateY(-20px)'
            });
            
            setTimeout(function() {
                $notification.css({
                    'opacity': '1',
                    'transform': 'translateY(0)',
                    'transition': 'all 0.4s ease-out'
                });
            }, 100);
        }
    };
    
    return Animations;
});
