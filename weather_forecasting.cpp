)

main

Server Explorer

using namespace web::http;

using namespace web::http::client;

int main() {


cout << "\t+-o-0-0-0-0-0-0-0-0-0-0-0-0-0-0-+" << endl;

Properties



cout << "\t\tMy Weather App" << endl;





cout << "\t+-0-0-0-0-0-0-0-0-0-0-0-0-0-0-0-+" << endl;



cout << "\tEnter city name: ";



string city;



getline(cin, city);





http_client client(U("https://api.openweathermap.org/data/2.5"));

21

uri_builder builder(U("/weather"));

22

23

builder.append_query(U("q"), utility::conversions::to string t());

Toolbox

132%->

Output

No