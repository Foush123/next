/**
 * Interactive functionality for the Next theme.
 *
 * @module theme_next/interactions
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/notification'], function($, Ajax, Notification) {
    
    var Interactions = {
        
        /**
         * Initialize all interactions.
         */
        init: function() {
            this.initTabSwitching();
            this.initButtonInteractions();
            this.initCardInteractions();
            this.initFormInteractions();
            this.initTooltips();
            this.initModals();
        },
        
        /**
         * Initialize tab switching functionality.
         */
        initTabSwitching: function() {
            $('.nav-tab').on('click', function() {
                var $this = $(this);
                var targetTab = $this.data('tab');
                
                // Update active tab
                $('.nav-tab').removeClass('active');
                $this.addClass('active');
                
                // Show target tab content
                $('.tab-pane').removeClass('active');
                $('#' + targetTab).addClass('active');
                
                // Animate tab transition
                Interactions.animateTabTransition($('.tab-pane.active'), $('#' + targetTab));
            });
        },
        
        /**
         * Initialize button interactions.
         */
        initButtonInteractions: function() {
            // Ripple effect for buttons
            $('.btn').on('click', function(e) {
                var $btn = $(this);
                var ripple = $('<span class="ripple"></span>');
                var rect = this.getBoundingClientRect();
                var size = Math.max(rect.width, rect.height);
                var x = e.clientX - rect.left - size / 2;
                var y = e.clientY - rect.top - size / 2;
                
                ripple.css({
                    width: size,
                    height: size,
                    left: x,
                    top: y
                });
                
                $btn.append(ripple);
                
                setTimeout(function() {
                    ripple.remove();
                }, 600);
            });
            
            // Button loading states
            $('.btn[data-loading]').on('click', function() {
                var $btn = $(this);
                var originalText = $btn.text();
                
                $btn.prop('disabled', true)
                    .html('<i class="fas fa-spinner fa-spin"></i> Loading...');
                
                // Simulate loading
                setTimeout(function() {
                    $btn.prop('disabled', false)
                        .text(originalText);
                }, 2000);
            });
        },
        
        /**
         * Initialize card interactions.
         */
        initCardInteractions: function() {
            // Card click interactions
            $('.dashboard-card[data-action]').on('click', function() {
                var action = $(this).data('action');
                var target = $(this).data('target');
                
                switch(action) {
                    case 'navigate':
                        if (target) {
                            window.location.href = target;
                        }
                        break;
                    case 'modal':
                        if (target) {
                            Interactions.openModal(target);
                        }
                        break;
                    case 'toggle':
                        $(this).toggleClass('expanded');
                        break;
                }
            });
            
            // Card hover effects
            $('.dashboard-card').on('mouseenter', function() {
                $(this).addClass('hovered');
            }).on('mouseleave', function() {
                $(this).removeClass('hovered');
            });
        },
        
        /**
         * Initialize form interactions.
         */
        initFormInteractions: function() {
            // Form validation
            $('form').on('submit', function(e) {
                var $form = $(this);
                var isValid = true;
                
                $form.find('[required]').each(function() {
                    var $field = $(this);
                    if (!$field.val()) {
                        $field.addClass('error');
                        isValid = false;
                    } else {
                        $field.removeClass('error');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    Interactions.showNotification('Please fill in all required fields.', 'error');
                }
            });
            
            // Real-time validation
            $('input, textarea, select').on('blur', function() {
                var $field = $(this);
                var value = $field.val();
                var pattern = $field.data('pattern');
                
                if (pattern && value) {
                    var regex = new RegExp(pattern);
                    if (!regex.test(value)) {
                        $field.addClass('error');
                        Interactions.showFieldError($field, 'Invalid format');
                    } else {
                        $field.removeClass('error');
                        Interactions.hideFieldError($field);
                    }
                }
            });
        },
        
        /**
         * Initialize tooltips.
         */
        initTooltips: function() {
            $('[data-tooltip]').each(function() {
                var $this = $(this);
                var tooltipText = $this.data('tooltip');
                var tooltip = $('<div class="tooltip">' + tooltipText + '</div>');
                
                $this.on('mouseenter', function() {
                    $this.append(tooltip);
                    setTimeout(function() {
                        tooltip.addClass('show');
                    }, 10);
                }).on('mouseleave', function() {
                    tooltip.removeClass('show');
                    setTimeout(function() {
                        tooltip.remove();
                    }, 300);
                });
            });
        },
        
        /**
         * Initialize modals.
         */
        initModals: function() {
            // Open modal
            $('[data-modal]').on('click', function() {
                var modalId = $(this).data('modal');
                Interactions.openModal(modalId);
            });
            
            // Close modal
            $('.modal-close, .modal-overlay').on('click', function() {
                Interactions.closeModal();
            });
            
            // Escape key to close modal
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    Interactions.closeModal();
                }
            });
        },
        
        /**
         * Open a modal.
         */
        openModal: function(modalId) {
            var $modal = $('#' + modalId);
            if ($modal.length) {
                $modal.addClass('active');
                $('body').addClass('modal-open');
                Interactions.animateModal($modal);
            }
        },
        
        /**
         * Close modal.
         */
        closeModal: function() {
            $('.modal.active').removeClass('active');
            $('body').removeClass('modal-open');
        },
        
        /**
         * Show notification.
         */
        showNotification: function(message, type) {
            var notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
            $('body').append(notification);
            
            Interactions.animateNotification(notification);
            
            setTimeout(function() {
                notification.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        },
        
        /**
         * Show field error.
         */
        showFieldError: function($field, message) {
            var error = $('<div class="field-error">' + message + '</div>');
            $field.after(error);
        },
        
        /**
         * Hide field error.
         */
        hideFieldError: function($field) {
            $field.siblings('.field-error').remove();
        },
        
        /**
         * Animate tab transition.
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
    
    return Interactions;
});
