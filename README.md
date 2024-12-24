# RTB Banner Response

This project implements a Real-Time Bidding (RTB) Banner Campaign Response system in PHP.

## Features
- Handles bid requests and validates incoming JSON data.
- Matches campaigns based on bid request parameters.
- Returns the best-matched campaign in JSON format.

## Project Structure
```
rtb-banner-response/
├── public/
│   ├── index.php        # Entry point for handling incoming requests
├── src/
│   ├── Campaigns.php    # Contains the predefined campaign array
│   ├── BidRequest.php   # Handles parsing and validation of bid requests
│   ├── CampaignSelector.php # Logic for selecting the best campaign
│   ├── ResponseGenerator.php # Generates the response JSON
├── tests/
│   ├── test_bid_request.json  # Sample bid request for testing
│   ├── test_campaign_selection.php # Test cases for campaign selection
├── logs/
│   ├── error.log        # Log file for errors
│   ├── access.log       # Log file for access tracking
├── config/
│   ├── config.php       # Configuration settings for the application
├── composer.json        # Dependency manager configuration file
├── README.md            # Project description and usage instructions
└── .env                 # Environment variables (e.g., for API credentials)
```

## Installation
1. Clone the repository.
2. Run `composer install` to set up autoloading.
3. Configure `.env` for your environment.
4. Deploy on a server or test locally using PHP's built-in server.

## Usage
- Send a POST request with a bid request JSON to `public/index.php`.
- Check the response for the best-matched campaign or an error message.

## Testing
- Use the sample bid request in `tests/test_bid_request.json`.
- Run `tests/test_campaign_selection.php` to validate campaign selection logic.
```