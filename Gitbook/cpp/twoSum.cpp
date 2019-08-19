#include <stdio.h>
#include <vector>
#include <tr1/unordered_map>
#include <iostream>
using namespace std::tr1;
using std::vector;
using std::cout;
using std::endl;

class Solution {
public:
    vector<int> twoSum(vector<int> &numbers, int target) {
        unordered_map<int, int> m;
        vector<int> result;
        for(int i=0; i<numbers.size(); i++){
            // not found the second one
            if (m.find(numbers[i])==m.end() ) {
                // store the first one poisition into the second one's key
                m[target - numbers[i]] = i;
            }else {
                // found the second one
                result.push_back(m[numbers[i]]+1);
                result.push_back(i+1);
                break;
            }
        }
        return result;
    }
};

int main(){
    vector<int> v;
    for( int  i = 0; i < 10; i++ )
   {
             v.push_back( i );
   }
    int j=3;
    Solution S;
    vector<int> r;
    r=S.twoSum(v,j);
    cout << r.size() << endl;
    for(int k=0;k<r.size();k++){
        cout << r[k] << endl;
}
}
