import { mount } from 'vue-test-utils';
import UserTable from '../../resources/assets/js/components/user-table';
import expect from 'expect';

describe('UserTable', () => {
  it('Table shows data', () => {
    let wrapper = mount(UserTable);
  });
});
