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
   cd rtb-banner-response
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
  "id": "myB92gUhMdC5DUxndq3yAg",
  "imp": [
    {
      "id": "1",
      "banner": {
        "w": 320,
        "h": 480,
        "pos": 1,
        "api": [
          3,
          5,
          6,
          7
        ],
        "format": [
          {
            "w": 776,
            "h": 393
          },
          {
            "w": 667,
            "h": 375
          },
          {
            "w": 640,
            "h": 360
          },
          {
            "w": 592,
            "h": 360
          },
          {
            "w": 568,
            "h": 320
          },
          {
            "w": 320,
            "h": 480
          },
          {
            "w": 750,
            "h": 200
          },
          {
            "w": 400,
            "h": 300
          }
        ]
      },
      "displaymanager": "GOOGLE",
      "instl": 1,
      "tagid": "3167273236690230250",
      "bidfloor": 0.01,
      "bidfloorcur": "USD",
      "secure": 1,
      "exp": 3600,
      "metric": [
        {
          "type": "click_through_rate",
          "value": 0.19889350235462189,
          "vendor": "EXCHANGE"
        },
        {
          "type": "viewability",
          "value": 0.97999999999999998,
          "vendor": "EXCHANGE"
        }
      ],
      "ext": {
        "billing_id": [
          "123456789",
          "152349838468"
        ],
        "publisher_settings_list_id": [
          "10210479292634817089",
          "14735124967324597266"
        ],
        "allowed_vendor_type": [
          785,
          767,
          144
        ],
        "ampad": 2,
        "creative_enforcement_settings": {
          "policy_enforcement": 2,
          "scan_enforcement": 1,
          "publisher_blocks_enforcement": 1
        },
        "auction_environment": 0
      }
    }
  ],
  "app": {
    "name": "com.ludo.king",
    "bundle": "com.ludo.king",
    "publisher": {
      "id": "pub-5742233882270312",
      "ext": {
        "country": "GB"
      }
    },
    "content": {
      "url": "https://play.google.com/store/apps/details?id=com.firsttouchgames.dls7",
      "userrating": "4.3",
      "livestream": 0,
      "language": "en"
    },
    "storeurl": "https://play.google.com/store/apps/details?id=com.firsttouchgames.dls7",
    "ext": {
      "inventorypartnerdomain": ""
    }
  },
  "device": {
    "ua": "Mozilla/5.0 (Linux; Android 11; M2004J19C Build/RP1A.200720.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/107.0.5304.105 Mobile Safari/537.36 (Mobile; afma-sdk-a-v224417037.224417037.0)",
    "ip": "103.92.152.0",
    "geo": {
      "lat": 23.774545669555664,
      "lon": 90.440811157226562,
      "country": "BGD",
      "city": "Dhaka",
      "zip": "1212"
    },
    "make": "xiaomi",
    "model": "m2004j19c",
    "os": "android",
    "osv": "11",
    "devicetype": 4,
    "ifa": "90637fa5-79c8-4a22-97bd-0c8c7e853f16",
    "lmt": 0,
    "w": 776,
    "h": 393,
    "pxratio": 2.75,
    "ext": {
      "user_agent_data": {
        "platform": {
          "brand": "Android",
          "version": [
            "11"
          ]
        },
        "mobile": 1,
        "model": "M2004J19C",
        "browsers": [
          {
            "brand": "Mozilla",
            "version": [
              "5",
              "0"
            ]
          },
          {
            "brand": "AppleWebKit",
            "version": [
              "537",
              "36"
            ]
          },
          {
            "brand": "Version",
            "version": [
              "4",
              "0"
            ]
          },
          {
            "brand": "Chrome",
            "version": [
              "107",
              "0",
              "5304",
              "105"
            ]
          },
          {
            "brand": "Mobile Safari",
            "version": [
              "537",
              "36"
            ]
          }
        ]
      }
    }
  },
  "user": {
    "id": "CAESEK7QRNHvCqCtWwFtkJjMQVU",
    "ext": {}
  },
  "at": 1,
  "tmax": 1000,
  "cur": [
    "USD"
  ],
  "bcat": [
    "IAB1-2"
  ],
  "source": {
    "ext": {
      "omidpn": "Google",
      "omidpv": "afma-sdk-a-v223712999.222508000.1",
      "schain": {
        "complete": 1,
        "nodes": [
          {
            "asi": "google.com",
            "sid": "pub-5742233882270312",
            "hp": 1
          }
        ],
        "ver": "1.0"
      }
    }
  },
  "ext": {
    "google_query_id": "AA8e6VI-G-6PHEjFD9KLYFQqH6v_SGtU6wcSv_E4yC7YgDuY37SAecQnCz_PggyO4x3-KIFQA",
    "fcap_scope": 3,
    "privacy_treatments": {
      "allow_user_data_collection": 1
    }
  }
}
```

#### Example Response
If a suitable campaign is found:
```json
{
  "id": "myB92gUhMdC5DUxndq3yAg",
  "seatbid": [
    {
      "bid": [
        {
          "id": "118965F12BE33FB7E",
          "impid": "myB92gUhMdC5DUxndq3yAg",
          "price": 0.1,
          "adid": 167629,
          "nurl": "https=>//adplaytechnology.com/",
          "adm": "https=>//s3-ap-southeast-1.amazonaws.com/elasticbeanstalk-ap-southeast-15410920200615/CampaignFile/20240117030213/D300x250/e63324c6f222208f1dc66d3e2daaaf06.png",
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