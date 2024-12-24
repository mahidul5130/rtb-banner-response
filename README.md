Here's an updated README file with a section for the `test/test_bid_request.json` file:

---

# Real-Time Bidding (RTB) Application

This project is a Real-Time Bidding (RTB) server application designed to receive bid requests, process them against predefined campaigns, and return a suitable response with the selected campaign details.

## Table of Contents

- [Overview](#overview)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Test Data](#test-data)
- [Endpoints](#endpoints)
- [Technologies Used](#technologies-used)
- [License](#license)

---

## Overview

The RTB application processes incoming bid requests from ad exchanges. It selects the most suitable campaign based on specified criteria such as dimensions, country, device type, and bid floor. If a suitable campaign is found, the application returns a response containing the campaign details. Otherwise, it responds with an appropriate error message.

---

## Project Structure

```
RTB
├── public
│   └── index.php          # Main entry point of the application
├── src
│   ├── BidRequest.php     # Parses and validates incoming bid requests
│   ├── Campaigns.php      # Stores and retrieves campaign data
│   ├── CampaignSelector.php  # Selects the best campaign based on criteria
│   ├── ResponseGenerator.php # Generates responses for the selected campaign
├── test
│   └── test_bid_request.json  # Example test bid request
└── README.md              # Project documentation
```

---

## Installation

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd RTB
   ```

2. **Set up a local server:**
   Use PHP's built-in server or any preferred web server to serve the `public/index.php` file.

3. **Start the PHP server:**
   ```bash
   php -S localhost:8000 -t public
   ```

---

## Usage

### Sending a Bid Request

Send a POST request to the application with a JSON payload containing bid details.

#### Example Request
You can use the test bid request JSON file as a sample payload. The file is located at `test/test_bid_request.json`.

```json
{
  "id": "123456",
  "imp": [
    {
      "banner": {
        "w": 320,
        "h": 480
      },
      "bidfloor": 0.1
    }
  ],
  "device": {
    "os": "Android",
    "geo": {
      "country": "BGD"
    }
  }
}
```

#### Example Response
If a suitable campaign is found:
```json
{
  "id": "123456",
  "seatbid": [
    {
      "bid": [
        {
          "id": "118965F12BE33FB7E",
          "impid": "123456",
          "price": 0.1,
          "adid": 167629,
          "nurl": "https://adplaytechnology.com/",
          "adm": "https://s3-ap-southeast-1.amazonaws.com/elasticbeanstalk-ap-southeast-15410920200615/CampaignFile/20240117030213/D300x250/e63324c6f222208f1dc66d3e2daaaf06.png",
          "crid": 167629,
          "w": 320,
          "h": 480
        }
      ]
    }
  ],
  "cur": "USD"
}
```

If no campaign is suitable:
```json
{
  "message": "No suitable campaign found"
}
```

---

## Test Data

The `test/test_bid_request.json` file contains a sample bid request that can be used for testing the application.

**File Location:** `test/test_bid_request.json`

**Contents:**
```json
{
  "id": "123456",
  "imp": [
    {
      "banner": {
        "w": 320,
        "h": 480
      },
      "bidfloor": 0.1
    }
  ],
  "device": {
    "os": "Android",
    "geo": {
      "country": "BGD"
    }
  }
}
```

---

## Endpoints

### `POST /`

- **Description:** Receives a bid request, processes it, and returns a response.
- **Request Body:** JSON payload with bid request details.
- **Response:** JSON response with selected campaign details or an error message.

---

## Technologies Used

- **PHP:** Core language for building the server application.
- **JSON:** Format for bid requests and responses.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Contributing

Feel free to contribute to this project by submitting issues or pull requests. Ensure code quality and proper documentation for any additions.

---

## Author

Name: Md. Mahidul Haque
Email: mahidul5130@gmail.com